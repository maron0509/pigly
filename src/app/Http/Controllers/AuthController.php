<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginPost(LoginRequest $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect('/weight_logs');
    }
    return back()->withErrors([
    'email' => 'ログイン情報が登録されていません'
]);
}

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

     public function step1()
    {
        return view('register_step1');
    }

    public function storeStep1(RegisterRequest $request)
    {
        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    Auth::login($user);

        return redirect('/register/step2');
    }
}
