<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SessionController extends Controller
{
    // function to handle user registration
    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
        // Redirect to login page with success message
        return redirect('/login')->with('success', 'Registration successful. Please log in.');
    }

    public function login(Request $request)
    {
        // Validate the request data
        $validatedInput = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($validatedInput)) {
            // Redirect to the dashboard or home page
            return redirect('/');
        }

        // Redirect back with an error message
        return redirect('/login')->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        // Log the user out
        Auth::logout();

        // Redirect to the login page with a success message
        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }

}
