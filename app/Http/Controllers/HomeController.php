<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Carbon\Carbon;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    //
    public function HomeSlider()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function addSlider()
    {
        return view('admin.slider.create');
    }

    public function storeSlider(Request $req)
    {

        $req->validate(
            [
                'title' => 'required|unique:sliders|min:3',
                'image' => 'required|mimes:jpg,jpeg,png',
            ]
        );

        $slider_image = $req->file('image');

        $name_generate = hexdec(uniqid()) . '.' . $slider_image->getClientOriginalExtension();   //give a name 
        $upload_location = 'images/slider/';    //where to save 
        Image::make($slider_image)->resize(1920, 1088)->save($upload_location . $name_generate);    //where to save
        $last_img = $upload_location . $name_generate; //where and how is saved

        Slider::insert([
            'title' => $req->title,
            'description' => $req->description,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Slider Stored Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('slider')->with($notification);
    }

    public function Edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function Update(Request $request, $id)
    {
        $request->validate(
            [
                //we remove unique validation bc when user want to change only image this gives an error 
                'title' => 'required',
            ]
        );

        //save old image
        $old_image = $request->old_image;

        $slider_image = $request->file('image');

        $notification = array(
            'message' => 'Brand Updated Successfully',
            'alert-type' => 'info'
        );

        if ($slider_image) {
            //SAVE image
            $name_generate = hexdec(uniqid());    //get the unique id
            $img_extension = strtolower($slider_image->getClientOriginalExtension());      //get the extension
            $img_name = $name_generate . '.' . $img_extension;    //merge id with extension

            $upload_location = 'images/slider/';    //where to save 

            $last_img = $upload_location . $img_name;   //image name with unique name and where is saved
            $slider_image->move($upload_location, $img_name);

            //if file exist
            if (Storage::exists(public_path($old_image))) {
                unlink($old_image);
            }

            Slider::find($id)->Update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->route('slider')->with($notification);
        } else {
            Slider::find($id)->Update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'info'
            );

            return Redirect()->route('slider')->with($notification);
        }
    }

    public function Delete($id)
    {
        $slider = Slider::find($id);
        $old_image = $slider->image;

        //if file exist
        if (Storage::exists(public_path($old_image))) {
            unlink($old_image);
        }

        Slider::find($id)->delete();

        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'error'
        );

        return Redirect()->back()->with($notification);
    }
}
