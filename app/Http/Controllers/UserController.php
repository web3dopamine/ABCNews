<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $list = \DB::table('users')->orderBy('id', 'desc')->get();

        return view('users.index', ['user' => $user, 'list' => $list]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'name' => ['required'],
                'email' => ['required', 'unique:users,email'],
                'password' => ['required', 'same:repeat_password'],
                'repeat_password' => ['required'],
            ]);

            \DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            $request->session()->flash('status', 'User was added successfully!');
        }

        $user = Auth::user();

        return view('users.create', ['user' => $user]);
    }

    public function delete($id)
    {
        \DB::table('users')->where('id', $id)->delete();

        return ['success' => true];
    }

    public function edit($id, Request $request)
    {
        $userEdit = \DB::table('users')->where('id', $id)->first();
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:users,email,'.$userEdit->id],
            ]);

            \DB::table('users')->where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            $userEdit = \DB::table('users')->where('id', $id)->first();
            $request->session()->flash('status', 'User was updated successfully!');
        }

        $user = Auth::user();


        return view('users.edit', ['user' => $user, 'userEdit' => $userEdit]);
    }
}
