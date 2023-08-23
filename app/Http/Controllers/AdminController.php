<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function adminLogin(){
        return view('admin.login');
    }

    public function adminDashboard(){
        return view('admin.dash');
    }

    public function profile(){
        return view('admin.profile');
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
            'message' => 'Admin profile has been updated successfully!',
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
            if(Storage::disk('s3')->exists('admin/profile_images/'.substr($user->photo, strrpos($user->photo, '/')+1))):
                Storage::disk('s3')->delete('admin/profile_images/'.substr($user->photo, strrpos($user->photo, '/')+1));
            endif;
            $path = Storage::disk('s3')->put('admin/profile_images', $request->photo);
            $path = Storage::disk('s3')->url($path);           
            User::whereId($user->id)->update(['photo' => $path]);
        endif;
        $notification = array(
            'message' => 'Admin profile image has been updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function profileSettings(){
        return view('admin.settings');
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
            'message' => 'Admin profile password has been updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function vendors(){
        return view('admin.vendor.index');
    }

    public function editVendor($id){
        $vendor = User::findOrFail(decrypt($id));
        return view('admin.vendor.edit', compact('vendor'));
    }

    public function updateVendor(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|email:rfc,dns,filter|unique:users,email,'.$id,
            'status' => 'required',
            'photo' => 'max:512'
        ]);
        $input = $request->all(); $vendor = User::findOrFail($id);
        if($request->file('photo')):
            $input['photo'] = uploadImage($new_image = $request->file('photo'), $width = 150, $height = NULL, $old_image = $vendor->photo, $path = 'vendor/profile_images/');     
        endif;
        $vendor->update($input);
        $notification = array(
            'message' => "Vendor details has been updated successfully!",
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function destroyVendor($id){
        User::findOrFail(decrypt($id))->update(['status' => 'inactive', 'updated_at' => Carbon::now()]);
        $notification = array(
            'message' => 'Vendor has been cancelled successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.vendors')->with($notification);
    }

    public function adminLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login')->with("success", "User logged out successfully!");
    }

}
