<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginView(){
        return view('auth.login');
    }

    public function registerView(){
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $user->assignRole('user');
        Auth::login($user);

        return redirect()->intended();
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'remember_me' => ['boolean']
        ]);

        if (!Auth::attempt($validatedData)) {
            return redirect()->back()->with(['message' => 'Неверный Email или Пароль от аккаунта']);
        }

        return redirect()->intended();
    }
}
