<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.create');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (\Illuminate\Support\Facades\Auth::attempt($credentials, $remember)) {
            // Authentication was successful...
            return redirect()->intended('/');
        } else {
            // Authentication failed...
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }
}