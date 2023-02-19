<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login/index', [
            'title' => 'Login',
            'active' => 'login',
            'state' => 'login'
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns|max:255',
            'password' => 'required|min:8|max:20',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request -> session() -> invalidate();
        $request -> session() -> regenerateToken();
        return redirect('/');
    }

}