<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\UploadFileTrait;
use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use UploadFileTrait;

    public function profile()
    {
        $data['user'] = User::first();

        return view('admin.profile.edit', compact('data'));
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $userData = User::where('id', $request->user_id)->first();

        if ($userData['password'] != $request->password) {
            $update_data = User::where('id', $request->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } else {
            $update_data = User::where('id', $request->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        if (! empty($update_data)) {
            return redirect()->back()->with('success', 'Profile Updated Successfully!');
        } else {
            return redirect()->back()->wih('error', 'Something went wrong!');
        }
    }

    public function change_password(Request $request)
    {
        $validated = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);

        $data_check = User::where('id', $request->user_id)->first();

        if (Hash::check($request->old_password, $data_check->password)) {
            if ($request->old_password == $request->new_password) {
                return redirect()->back()->with('error', 'Old Password and New Password Can not be same!');
            } else {
                $update_data = User::where('id', $request->user_id)->update([
                    'password' => Hash::make($request->new_password),
                ]);
                if (! empty($update_data)) {
                    return redirect()->back()->with('success', 'Password Updated Successfully!');
                } else {
                    return redirect()->back()->with('error', 'Something went wring!');
                }
            }
        } else {
            return redirect()->back()->with('error', 'Old Password is not Correct!');
        }
    }
}
