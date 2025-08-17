<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view ('auth.login');
    }
    public function store(LoginRequest $request){
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('product.list');
        }

        return back()->withErrors([
            // 'auth' => 'ログイン情報が登録されていません',
            'email' => 'ログイン情報が登録されていません',
        ])->withInput();
    }
}
