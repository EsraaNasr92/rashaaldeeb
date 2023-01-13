<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    public function showChangePasswordGet() {
        return view('admin.settings.index');
    }

    public function changePasswordPost(Request $request) {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");
    }

    public function upload(Request $request)
    {
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/users'), $filename);
            Auth()->user()->update(['image'=>$filename]);
        }
        return redirect()->back();

    }
}
