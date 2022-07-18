<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\MultiImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;




class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allClients()
    {
        $clients = Client::latest()->paginate(5);
        return view('admin.client.index', compact('clients'));
    }

    public function addClient(Request $request)
    {
        $request->validate(
            [
                'client_name' => 'required|unique:clients|min:3',
                'client_image' => 'required|mimes:jpg,jpeg,png',
            ]
        );

        $client_image = $request->file('client_image');

        $name_generate = hexdec(uniqid()) . '.' . $client_image->getClientOriginalExtension();   //give a name 
        $upload_location = 'images/client/';    //where to save 
        Image::make($client_image)->resize(300, 200)->save($upload_location . $name_generate);    //where to save
        $img_result = $upload_location . $name_generate; //where and how is saved

        Client::insert([
            'client_name' => $request->client_name,
            'client_image' => $img_result,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Client Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }


    public function Edit($id)
    {
        $client = Client::find($id);
        return view('admin.client.edit', compact('client'));
    }


    public function Update(Request $request, $id)
    {

        $request->validate(
            [
                //we remove this unique bc when user want to change only image this gives an error 
                'client_name' => 'required|min:3',
            ]
        );

        $old_image = $request->old_image;

        $client_image = $request->file('client_image');

        $notification = array(
            'message' => 'Client Updated Successfully',
            'alert-type' => 'info'
        );

        if ($client_image) {
            //SAVE image
            $name_generate = hexdec(uniqid());    //get the unique id
            $img_extension = strtolower($client_image->getClientOriginalExtension());      //get the extension
            $img_name = $name_generate . '.' . $img_extension;    //merge id with extension

            $upload_location = 'images/client/';    //where to save 

            $last_img = $upload_location . $img_name;   //image name with unique name and where is saved
            $client_image->move($upload_location, $img_name);

            //if file exist
            if (Storage::exists(public_path($old_image))) {
                unlink($old_image);
            }
            Client::find($id)->Update([
                'client_name' => $request->client_name,
                'client_image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->route('client')->with($notification);
        } else {
            Client::find($id)->Update([
                'client_name' => $request->client_name,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->route('client')->with($notification);
        }
    }


    public function Delete($id)
    {
        $client = Client::find($id);
        $old_image = $client->client_image;
        //if file exist
        if (Storage::exists(public_path($old_image))) {
            unlink($old_image);
        }
        Client::find($id)->delete();

        $notification = array(
            'message' => 'Client Deleted Successfully',
            'alert-type' => 'error'
        );

        return Redirect()->back()->with($notification);
    }


    //Multi Image

    public function multiImage()
    {
        $images = MultiImage::all();
        return view('admin.multiImage.index', compact('images'));
    }

    public function addMultiImage(Request $request)
    {
        $image = $request->file('image');

        foreach ($image as $multi_img) {
            $name_generate = hexdec(uniqid()) . '.' . $multi_img->getClientOriginalExtension();   //give a name 
            $upload_location = 'images/multi/';    //where to save 
            Image::make($multi_img)->resize(300, 300)->save($upload_location . $name_generate);    //where to save
            $last_img = $upload_location . $name_generate; //where and how is saved

            MultiImage::insert([
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        }
        $notification = array(
            'message' => 'Multi Images Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function Logout()
    {
        Auth::logout();
        $notification = array(
            'message' => 'You logged out Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('login')->with($notification);
    }
}
