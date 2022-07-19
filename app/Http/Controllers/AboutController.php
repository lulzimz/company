<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\HomeAbout;
use App\Models\MultiImage;
use App\Models\Multipic;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
        //HOME
    public function about()
    {
        $about = HomeAbout::first();
        $users = User::all();
        $clients= Client::all();
        return view('pages.about', compact('about','users','clients'));
    }

        //ADMIN

    public function HomeAbout()
    {
        $homeabout = HomeAbout::latest()->get();
        return view('admin.about.index', compact('homeabout'));
    }

    public function AddAbout()
    {
        return view('admin.about.create');
    }

    public function StoreAbout(Request $request)
    {

        $request->validate(
            [
                'title' => 'required',
                'short_dis' => 'required',
            ]
        );

        HomeAbout::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'About Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('home.about')->with($notification);
    }


    public function EditAbout($id)
    {
        $homeabout = HomeAbout::find($id);
        return view('admin.about.edit', compact('homeabout'));
    }

    public function UpdateAbout(Request $request, $id)
    {
        
        $request->validate(
            [
                'title' => 'required',
                'short_dis' => 'required',
            ]
        );

        $update = HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
        ]);

        $notification = array(
            'message' => 'About Updated Successfully',
            'alert-type' => 'warning'
        );

        return Redirect()->route('home.about')->with($notification);
    }

    public function DeleteAbout($id)
    {
        HomeAbout::find($id)->Delete();
        $notification = array(
            'message' => 'About Deleted Successfully',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

    public function MultiImage()
    {
        $images = MultiImage::all();
        return view('pages.multiimage', compact('images'));
    }
}
