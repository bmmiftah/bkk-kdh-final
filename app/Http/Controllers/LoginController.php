<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request) 
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        $email=$credentials['email'];
        $password=$credentials['password'];

        

        if(Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
                $request->session()->regenerate();
                return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login gagal atau Email kamu belum aktif!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/');
    }

}
