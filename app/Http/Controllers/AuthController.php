<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|string|min:8|confirmed'
        ]);

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('index')->with('success', "Welcome {$user->name} to AniList!");
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($validated)) {
            $user = Auth::user();
            $request->session()->regenerate();

            return redirect()->route('eyce.index')->with('success', "{$user->name} has logged in!");;
        }

        throw ValidationException::withMessages([
            'credentials' => 'Login Failed: Incorrect Credentials'
        ]);
    }

    public function logout()
    {

    }

}
