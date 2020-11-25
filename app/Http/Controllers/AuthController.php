<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function showFormLogin()
    {
        return view('admin.login');
    }

    function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.showDashBoard');
        } else {
            return redirect()->route('login');
        }
    }

    function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
