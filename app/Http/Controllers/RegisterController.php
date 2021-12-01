<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterForm extends Controller
{
    public function createUser(Request $request) {
        return User::create([
            'regEmail' => $request -> email,
            'firstname' => $request -> firstname,
            'lastname' => $request -> lastname,
            'password' => $request -> password,

        ]);
        
        response()->json(null, 200);
    }
}
