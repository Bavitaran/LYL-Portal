<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
    /**
    * Create user
    *
    * @param  [string] fullname
    * @param  [string] email
    * @param  [string] password
    * @param  [string] company_name
    * @return [string] ic_number
    */
    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string',
            'email'=>'required|string|unique:users',
            'password'=>'required|string',
            'ic_number' => 'required|:string',
            'company_name' => 'required|:string'
        ]);

        $user = new User([
            'fullname'  => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'company_name' => $request->company_name,
            'ic_number' => $request->ic_number
        ]);

        if($user->save()){
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->plainTextToken;

            return response()->json([
            'message' => 'Successfully created user!',
            'accessToken'=> $token,
            ],201);
        }
        else{
            return response()->json(['error'=>'Provide proper details']);
        }
    }


    // Login
    public function login(Request $request)
    {
        $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
        'remember_me' => 'boolean'
        ]);

        $credentials = request(['email','password']);
        if(!Auth::attempt($credentials))
        {
        return response()->json([
            'message' => 'Unauthorized'
        ],401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->plainTextToken;

        return response()->json([
        'accessToken' =>$token,
        'token_type' => 'Bearer',
        ],201);
    }
}