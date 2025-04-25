<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_list()
    {
        $data['users'] = User::get();

        return view('admin.user.index', compact('data'));
    }

    public function user_form($type, $id)
    {

        $data['user'] = User::where('id', $id)->first();
        $data['roles'] = Role::get();

        return view('admin.user.edit', compact('data'));
    }

    public function save_user(Request $request)
    {

        $id = ($request->id == 0) ? null : $request->id;
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'role_id' => 'required',
            'password' => $request->id == '0' ? 'required' : 'nullable',
        ]);

        $user = User::find($request->id);

        $password = ($request->id == '0' || ! empty($request->password))
            ? Hash::make($request->password)
            : ($user ? $user->password : null);

        User::updateOrCreate(['id' => $request->id], [
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => (int) $request->role_id,
            'password' => $password,
        ]);

        return to_route('user_list')->with('success', 'User created/updated successfully');
    }
}
