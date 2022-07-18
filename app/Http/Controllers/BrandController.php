<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\MultiImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;




class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allBrand()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function addBrand(Request $request)
    {
        $request->validate(
            [
                'brand_name' => 'required|unique:brands|min:3',
                'brand_image' => 'required|mimes:jpg,jpeg,png',
            ]
        );

        $brand_image = $request->file('brand_image');

        //SAVE image
        // $name_generate = hexdec(uniqid());    //get the unique id
        // $img_extension = strtolower($brand_image->getClientOriginalExtension());      //get the extension
        // $img_name = $name_generate . '.' . $img_extension;    //merge id with extension

        // $upload_location = 'images/brand/';    //where to save 

        // $last_img = $upload_location . $img_name;   //image name with unique name and where is saved
        // $brand_image->move($upload_location, $img_name);


        $name_generate = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();   //give a name 
        $upload_location = 'images/brand/';    //where to save 
        Image::make($brand_image)->resize(300, 200)->save($upload_location . $name_generate);    //where to save
        $last_img = $upload_location . $name_generate; //where and how is saved

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }


    public function Edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }


    public function Update(Request $request, $id)
    {

        $request->validate(
            [
                //we remove this unique bc when user want to change only image this gives an error 
                'brand_name' => 'required|min:3',
            ]
        );

        $old_image = $request->old_image;

        $brand_image = $request->file('brand_image');

        $notification = array(
            'message' => 'Brand Updated Successfully',
            'alert-type' => 'info'
        );

        if ($brand_image) {
            //SAVE image
            $name_generate = hexdec(uniqid());    //get the unique id
            $img_extension = strtolower($brand_image->getClientOriginalExtension());      //get the extension
            $img_name = $name_generate . '.' . $img_extension;    //merge id with extension

            $upload_location = 'images/brand/';    //where to save 

            $last_img = $upload_location . $img_name;   //image name with unique name and where is saved
            $brand_image->move($upload_location, $img_name);

            //if file exist
            if (Storage::exists(public_path($old_image))) {
                unlink($old_image);
            }
            Brand::find($id)->Update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->route('brand')->with($notification);
        } else {
            Brand::find($id)->Update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->route('brand')->with($notification);
        }
    }


    public function Delete($id)
    {
        $brand = Brand::find($id);
        $old_image = $brand->brand_image;
        //if file exist
        if (Storage::exists(public_path($old_image))) {
            unlink($old_image);
        }
        Brand::find($id)->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully',
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
