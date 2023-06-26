<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'username' => 'required|min:3|max:10|alpha|unique:users,username',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => [
                'required',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            ],
        ], [
            'username.required' => 'Please enter a username.',
            'username.min' => 'Username must be at least :min characters long.',
            'username.max' => 'Username must not be more than :max characters long.',
            'username.alpha' => 'Username must only contain alphabetic characters.',
            'username.unique' => 'This username is already in use.',
            'email.required' => 'Please enter an email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already in use.',
            'password.required' => 'Please enter a password.',
            'password.min' => 'Password must be at least :min characters long.',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, and one number.',
        ]);
            try {
                $user = $request->all();

                $newUser = new User([
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'password' => $user['password'],
                ]);
                $newUser->save();

                return redirect('login')->with('success', 'Signup successful.');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while signing up. Please try again.']);
            }
    }
}    
