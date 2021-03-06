<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function adminProfile()
    {
        $adminData = Admin::find(1);
        return view('admin.admin_profile_view', compact('adminData'));
    }
    public function adminProfileEdit()
    {
        $editData = Admin::find(1);
        return view('admin.admin_profile_edit', compact('editData'));
    }
    public function adminProfileStore(Request $request)
    {
        $data = Admin::find(1);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('uploads/admin_images/' . $data->profile_photo_path));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/admin_images'), $fileName);
            $data['profile_photo_path'] = $fileName;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin Profile Update Successfuly',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.profile')->with($notification);
    }
    public function adminChangePassword()
    {
        return view('admin.admin_change_password');
    }
    public function updateChangePassword(Request $request)
    {
        $validate = $request->validate([
            'old_passwords' => 'required',
            'password' => 'required|confirmed'
        ]);
        $hashPassword = Admin::find(1)->password;
        if (Hash::check($request->old_passwords, $hashPassword)) {
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        } else {
            return redirect()->back();
        }
    }
}
