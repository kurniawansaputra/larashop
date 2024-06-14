<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.backend.auth.login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to log the user in
        if (!auth()->attempt($credentials)) {
            return redirect()->route('goToLogin');;
        }

        // Redirect to the dashboard
        return redirect()->route('dashboard');
    }

    public function create()
    {
        return view('pages.backend.auth.register');
    }

    public function register(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
        ]);

        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Redirect to the dashboard
        return redirect()->route('goToLogin');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('goToLogin');
    }
}
