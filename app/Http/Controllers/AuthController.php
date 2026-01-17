<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show signup form
    public function showSignup()
    {
        return view('auth.signup');
    }

    // Signup submit
    public function signupPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully!');
    }

    // Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Login submit
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('students.index'); // redirect after login
        }

        return back()->withErrors(['email' => 'Invalid email or password']);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
