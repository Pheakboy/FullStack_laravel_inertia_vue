<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // register method
    public function register(Request $request){

        //validate request data
        $fields = $request->validate(([
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]));

        if($request->hasFile('avatar')){
            $fields['avatar'] = Storage::disk('public')->put('avatars', $request->file('avatar'));
        }

        //Register user
        $user = User::create($fields);

        //Redirect to login
        return redirect()->route('login')->with('message', 'Registration successful! Please log in.');
    }

    // login method
    public function Login(Request $request){
        // validate request data
       {
        $fields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($fields, $request->filled('remember'))) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard')->with('greet', 'You are logged in!');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    }
    // logout method
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
