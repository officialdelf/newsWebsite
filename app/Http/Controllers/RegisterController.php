<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\user;


class RegisterController extends Controller
{
    //
    public function showRegistrationForm(){
        
        return view('register');
    }
    //register
    public function register()
{

    $data = request()->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'profile_image' => ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'], // Adjust validation rules for profile_image if needed
    ]);

    $data['password'] = Hash::make($data['password']);

    User::create($data);

    return redirect('/login');
}

    public function showLoginForm(){
        return view('login');
    }
    public function login()
    {
        // Validate the login request
        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Authentication was successful
            return redirect('/'); // Redirect to the dashboard or any other route
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials']); // Redirect back with an error message
    }
}
