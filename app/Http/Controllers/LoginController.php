<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('admin.auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();
        
        return redirect('/'); 
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function store()
    {
        $attributes = [
            'name' => 'admin',
            'email' => 'eaglesdrone@admin.com',
            'password' => Hash::make('PASSWORD'),
            // 'password_confirmation' is not needed when creating users directly
            // 'terms' => 'NEW' // This should be handled according to your application's logic
        ];

        $user = User::create($attributes);

        dd('here'); // Dump and die with the string 'here'
    }
}
