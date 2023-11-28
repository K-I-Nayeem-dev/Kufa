<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function profile_index(){
        return view('layouts.dashboard.profile.profile_index');
    }

    public function profile_name_changed(Request $request){
        
        $request->validate([
            'name'=> 'required',
        ]);

        User::find(auth()->id())->update([
            'name'=>$request->name
        ]);

        return redirect('/profile')->with('name_updated', 'Name Update Successfully');

    }

    public function email_update(Request $request){
        
        $request->validate([
            'email'=> 'required',
        ]);

        User::find(auth()->id())->update([
            'email'=>$request->email
        ]);

        return redirect('/profile')->with('email_updated', 'Email Update Successfully');

    }
    
    public function password_changed(Request $request){

        $request->validate([
            'current_password'=>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
        ]);


        if(Hash::check($request->current_password, Auth::user()->password)){

            if($request->password == $request->password_confirmation){
                
                User::findOrFail(Auth::user()->id)->update([
                    'password'=> bcrypt($request->password)
                ]);
                // return 'password changed';
                return back()->with('password_updated', 'Failed Update Successfully');
            }
            else{
                return back()->with('password_match_failed', 'Failed Update Successfully');
                // return 'password not matche';
            }
        }
        else{
            return back()->with('password_updated_failed', 'Failed Update Successfully');
            // return 'password mil nai';
        }

    }

    public function profile_photo_upload(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image',
        ]);
        // return $request->file('profile_photo');
        $new_name = Auth::user()->id . "." . $request->file('profile_photo')->getClientOriginalExtension();
        $img =Image::make($request->file('profile_photo'))->resize(300, 200);
        $img->save(base_path('public/uploads/profile_photos/' . $new_name), 80);
        User::find(auth()->id())->update(
            [
                'profile_photo'=> $new_name,
            ]);
        return back()->with('photo_updated', 'Photo Update Successfully');
    }

}
