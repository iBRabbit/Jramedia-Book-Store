<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

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
            'email' => 'required',
            'password' => 'required',
        ]);

        if($request->has('remember')) {
            Cookie::queue(Cookie::make('remember', true, 60));
            Cookie::queue(Cookie::make('email', $request->email, 60));
            Cookie::queue(Cookie::make('password', $request->password, 60));
        } else {
            Cookie::queue(Cookie::forget('remember'));
            Cookie::queue(Cookie::forget('email'));
            Cookie::queue(Cookie::forget('password'));
        }
        
        if (Auth::attempt($credentials, $request->has('remember'))) {
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
