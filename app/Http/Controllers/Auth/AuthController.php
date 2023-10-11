<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // register functions 
    function register() {
        return view('auth.register');
    }

    function signUp(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'cpassword' => 'required',
        ]);

        if ($request->cpassword == $request->password) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return to_route('dashboard')->with('success','registered successfully');
        }

        return back()->with('error','password incompatible!!');
    }

    // Login functions

    function login() {
        return view('auth.login');
    }

    function signIn(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->all('email', 'password');
        if (Auth::attempt($credentials)) {
            return to_route('dashboard')->with('success','logged successfully');
        }
        return back()->with('warning','incorrect password or email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/'); // Redirect to the desired page after logout
    }
}
