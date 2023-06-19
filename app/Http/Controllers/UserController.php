<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = $request->all();

        $newUser = new User([
            'username' => $user['username'],
            'email' => $user['email'],
            'password' => $user['password'],
        ]);
        $newUser->save();
    }
}

