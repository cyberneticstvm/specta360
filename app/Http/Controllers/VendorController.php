<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
    public function vendorLogin(){
        return view('vendor.login');
    }

    public function vendorDashboard(){
        return view('vendor.dash');
    }

    public function profile(){
        return view('vendor.profile');
    }

    public function profileUpdate(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:rfc,dns,filter',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required',
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        $notification = array(
            'message' => 'Vendor profile has been updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function profilePhotoUpdate(Request $request){
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,web',
        ]);
        $user = User::findOrFail(Auth::user()->id);
        if($request->file('photo')):
            if(Storage::disk('s3')->exists('vendor/profile_images/'.substr($user->photo, strrpos($user->photo, '/')+1))):
                Storage::disk('s3')->delete('vendor/profile_images/'.substr($user->photo, strrpos($user->photo, '/')+1));
            endif;
            $path = Storage::disk('s3')->put('vendor/profile_images', $request->photo);
            $path = Storage::disk('s3')->url($path);
            $input['image'] = $path;           
            User::whereId($user->id)->update(['photo' => $path]);
        endif;
        $notification = array(
            'message' => 'Vendor profile image has been updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function profileSettings(){
        return view('vendor.settings');
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
        $notification = array(
            'message' => 'Vendor profile password has been updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function vendorLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/vendor/login')->with("success", "User logged out successfully!");
    }
}
