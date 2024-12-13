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
            'email' => 'required|email|exists:users,email', // Kiểm tra email có trong cơ sở dữ liệu
            'password' => 'required|min:3', // Kiểm tra mật khẩu
        ]);

        // Lấy thông tin email và password từ request
        $email = $request->email;
        $password = $request->password;

        // Tìm user theo email
        $user = User::where('email', $email)->first();

        // Kiểm tra user có tồn tại và mật khẩu có khớp không
        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);

            // Kiểm tra role
            // Kiểm tra role
            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            } elseif ($user->role === 'user') {
                return redirect()->route('home');
}

        }

        // Sai email hoặc mật khẩu
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
            'email' => 'required|email|exists:users,email', // Kiểm tra email có trong cơ sở dữ liệu
            'password' => 'required|min:3', // Kiểm tra mật khẩu
        ]);

        // Lấy thông tin email và password từ request
        $email = $request->email;
        $password = $request->password;

        // Tìm user theo email
        $user = User::where('email', $email)->first();

        // Kiểm tra user có tồn tại và mật khẩu có khớp không
        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);

            // Kiểm tra role
            // Kiểm tra role
            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            } elseif ($user->role === 'user') {
                return redirect()->route('home');
}

        }

        // Sai email hoặc mật khẩu
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->withInput();
    }
   
}
