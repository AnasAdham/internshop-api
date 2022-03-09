<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        return $user = User::create([
            'name'  => $request->input('name'),
            'email'  => $request->input('email'),
            'password'  => Hash::make($request->input('password'))
        ]);
    }
    public function user()
    {
        return "Authenticated user";
    }
}
