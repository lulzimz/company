<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use SebastianBergmann\Environment\Console;

class ChangePasswordController extends Controller
{
    //
    public function changePassword()
    {

        return view('admin.user.change_password');
    }

    public function UpdatePassword(Request $request)
    {

        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed|min:8'
        ]);
        //current pw
        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'Password Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('login')->with($notification);
        } else {
            $notification = array(
                'message' => 'Password not updated',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function editProfile()
    {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            if ($user) {
                return view('admin.user.profileUpdate', compact('user'));
            }
        }
    }

    public function profileUpdate(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $user = User::find(Auth::user()->id);
        if ($user) {

            $image = $req->file('image');
            $old_image = $user->profile_photo_path;

            if ($image) {
                $name_generate = hexdec(uniqid());    //get the unique id
                $img_extension = strtolower($image->getClientOriginalExtension());      //get the extension
                $img_name = $name_generate . '.' . $img_extension;    //merge id with extension

                $upload_location = 'images/profilePhoto/';    //where to save 

                $db_img_name = $upload_location . $img_name;   //database image name with unique name and where is saved
                $image->move($upload_location, $img_name);

                //if file exist
                if (file_exists(public_path($old_image)) && $old_image != null) {
                    unlink($old_image);
                }
                //save new image
                $user->profile_photo_path = $db_img_name;
            }

            $user->name = $req['name'];
            $user->email = $req['email'];
            $user->save();

            $notification = array(
                'message' => 'Profile updated Successfully',
                'alert-type' => 'info'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Profile not updated',
                'alert-type' => 'warning'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
