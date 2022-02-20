<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            $user = User::where(['email' => $request->email])->first();

            if (empty($user) || !(new BcryptHasher)->check($request->password, $user['password'])) {
                $errors = new \Illuminate\Support\MessageBag();
                $errors->add('email', 'Incorrect email/password.');

                return view('login', ['request' => $request])->withErrors($errors);
            } else {
                Auth::login($user);

                return redirect('/dashboard');
            }

        }

        return view('login', ['request' => $request]);
    }
}
