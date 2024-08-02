<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showFormLogin()
    {
        return view('frontend.auth.login');
    }

    // Hàm này được gọi sau khi đăng nhập thành công
    protected function authenticated(Request $request, $user)
    {
        // Chuyển hướng người dùng đến URL ban đầu
        return redirect()->intended();
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role == "admin") {
                return redirect('/admin');
            }

            if (Auth::user()->role == "editor") {
                return redirect('/admin');
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();

        \request()->session()->invalidate();

        return redirect('/');
    }
}
