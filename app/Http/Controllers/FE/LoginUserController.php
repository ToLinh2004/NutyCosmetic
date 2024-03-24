<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequests;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginUserController extends Controller {


    public function index() {

        return view('FE.pages.auth.login');
    }

    public function login(AuthRequests $request) {

        $credentials = [
            'email' =>  $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.user')->with('successs', 'Đăng nhập thành công');
        } else {
            return redirect()->route('login.index')->with('error', 'Email hoặc mật khẩu không đúng');
        }
    }

    public function register() {
        return view('FE.pages.auth.register');
    }

    public function store(Request $request) {
        $request->validate([
            'user_name' => 'required|string|max:250',
            'email' => 'required|email|max:250',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('login.index')
            ->withSuccess('Bạn đã đăng ký và đăng nhập thành công!');
    }

    public function logout(Request $request) {
        Auth::logout();
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.index');
    }
}
