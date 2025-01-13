<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index(){
       
    }


    public function login(){
        return view('auth.login');
    }

    public function post_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:3', 
        ]);

        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);

            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            } elseif ($user->role === 'user') {
                return redirect()->route('home');
            }

        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->withInput();
    }

    public function register(){
        return view('auth.register');
    }

    public function post_register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email', 
            'password' => 'required|min:3',
        ]);

        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);

            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            } elseif ($user->role === 'user') {
                return redirect()->route('home');
            }

        }
        return back()->withErrors([
            'email' => 'Lỗi email hoặc mật khẩu.',
        ])->withInput();
    }
   
}
