<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function userDashboard(){
        $addresses = Address::where('user_id', Auth::id())->get();
        return view('dashboard', compact('addresses'));
    }

    public function profileUpdate(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:rfc,dns,filter',
            'phone' => 'required|numeric|digits:10|unique:users,phone,'.Auth::id(),
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = ($request->username) ? $request->username : $user->getOriginal('username');
        $user->save();
        /*$notification = array(
            'message' => 'Account details has been updated successfully!',
            'alert-type' => 'success',
        );*/
        return redirect()->back()->withSuccess("Account details has been updated successfully!");
    }

    public function profilePhotoUpdate(Request $request){
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,webp|max:512',
        ]);
        $user = User::findOrFail(Auth::user()->id);
        if($request->file('photo')):
            if(Storage::disk('s3')->exists('user/profile_images/'.substr($user->photo, strrpos($user->photo, '/')+1))):
                Storage::disk('s3')->delete('user/profile_images/'.substr($user->photo, strrpos($user->photo, '/')+1));
            endif;
            $path = Storage::disk('s3')->put('user/profile_images', $request->photo);
            $path = Storage::disk('s3')->url($path);           
            User::whereId($user->id)->update(['photo' => $path]);
        endif;
        /*$notification = array(
            'message' => 'Profile image has been updated successfully!',
            'alert-type' => 'success',
        );*/
        return redirect()->back()->withSuccess("Profile image has been updated successfully!");
    }

    public function profileSettingsUpdate(Request $request){
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);
        User::whereId(Auth::user()->id)->update(['password' => Hash::make($request->password)]);
        // code for checking old password
        /*if(!Hash::check($request->old_password, Auth::user()->password)):
            return false;
        endif;*/
        /*$notification = array(
            'message' => 'Profile password has been updated successfully!',
            'alert-type' => 'success',
        );*/
        return redirect()->back()->withSuccess("Profile password has been updated successfully!");
    }

    public function userLogout(Request $request){
        Auth::guard('web')->logout();
        /*$request->session()->invalidate();
        $request->session()->regenerateToken();*/
        Auth::logout();
        return redirect('/login')->with("success", "User logged out successfully!");
    }
}
