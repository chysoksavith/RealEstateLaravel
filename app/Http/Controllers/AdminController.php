<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
    // logout
    public function AdminLogin()
    {
        return view('admin.admin_login');
    }
    // get data to frontend
    public function adminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }
    // update
    public function adminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            @unlink(public_path('uploade/admin_images/', $data->photo));
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName(); // 2342332.sdfsd.png
            $file->move(public_path('uploade/admin_images'), $filename);
            $data['photo'] = $filename;
        } // end

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method

    // change password view
    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    } // end
    // update pass
    public function AdminUpdatePassword(Request $request)
    {
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match the old password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            $notification = array(
                'message' => 'Old Password doesn\'t match!',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }

        // Update the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Change Success!',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }


}
