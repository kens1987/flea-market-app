<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Profile;

class RegisterController extends Controller
{
    public function create(){
        return view ('auth.register');
    }

    public function store(RegisterRequest $request){
        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        ]);
        Profile::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'image' => 'images/default-profile.png',
        ]);
        Auth::login($user);
        return redirect()->route('register.step2');
    }
    public function step2(){
        $user = auth()->user();
        return view('auth.register_step2',compact('user'));
    }
}

