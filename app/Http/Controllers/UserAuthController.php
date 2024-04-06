<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function user_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (auth()->user()->role === 'user' || auth()->user()->role === 'admin'){
                return redirect()->intended(route('home'));
            } else {
                Auth::logout();
                return redirect()->back()->with('error', 'You do not have access to this section.');
            }
        }

        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'These credentials do not match our records.']);
    
    }


    public function register(Request $request)
    {
        $request->validate([
            'r_email' => 'required|email|unique:users,email',
            'r_password' => 'required|min:6',
            'address' => 'required',
            'phone_number' => 'required',
            'name' => 'required',
        ]);

        if ($request->r_password !== $request->r_password_confirmation) {
            return back()->withInput($request->only('r_email'))
                         ->withErrors(['password_confirmation' => 'The password confirmation does not match.']);
        }



        $user = new User();
        $user->email = $request->r_email;
        $user->role = 'user';
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->password = bcrypt($request->r_password); 
        $user->save();

        return redirect()->back()->with('success', 'Registration successful! You can now log in.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'You have been logged out.'); 
    }
}
