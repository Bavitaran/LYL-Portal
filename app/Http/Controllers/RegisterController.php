<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;

class RegisterController extends Controller
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
    // Register

    public function index(){

        $users = User::with('role')->get();
        return $users;
    }
    public function register(Request $request)
    {
        $request->validate([
            'roles_id' => 'required|int',
            'fullname' => 'required|string',
            'email'=>'required|string|unique:users',
            'password'=>'required|string',
            'password_confirmation' => 'required|same:password',
            'mobile_number' => 'required|string|unique:users',
            'ic_number' => 'required|:string',
            'company_name' => 'required|:string',

        ]);

        $user = new User([
            'roles_id' => $request-> roles_id,
            'fullname'  => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'mobile_number' => $request->mobile_number,
            'company_name' => $request->company_name,
            'ic_number' => $request->ic_number
        ]);

        if($user->save()){
            return response()->json([
            'message' => 'Successfully created user!',
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
        // 'remember_me' => 'boolean'
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
        $token = $tokenResult->token;

        if($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        return response()->json([
            'message'=>'Authorized Successfully!',
            'access_token' => $tokenResult-> accessToken,
            'token_type'=> 'Bearer',
            'expires_at'=> Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString(),
            'userData' => $this->user($request),
            // 'refresh_token'=> 'the-refresh-token',
        ]);
        // redirect()->guest(route('dashboard-new'));
    }

    // User
    public function user()
    {
        $users = DB::table('users')
            ->join('roles','users.roles_id','=','roles.id')
            ->select('users.id','users.fullname','users.email','users.roles_id','roles.name as role')
            ->get();
        // $user = json_encode(json_decode($users));
        // $records = DB::table('report_list')
        //             ->join('users', 'report_list.user_id', '=', 'users.id')
        //             ->where('report_list.site_name', '=', $site_name);
        //             ->select('users.*', 'report_list.email_date','report_list.url','report_list.recipient')
        //             ->get();
        // DB::table('users')
        // ->select('users.id','users.name','profiles.photo')
        // ->join('profiles','profiles.id','=','users.id')
        // ->where(['something' => 'something', 'otherThing' => 'otherThing'])
        // ->get();
        // $users=  User::with('roles')->get();
        // $rolename = json_encode($users);
        
        return $users->shift();
        // return auth()->user()->roles->pluck('name');
    }

    // Update Profile
    public function updateProfile(Request $request)
    {
        //
    }

    // Change Password
    public function changePassword(Request $request)
    {
        $this->validate($request, [ 
            'oldpassword' => 'required',
            'newpassword' => 'required',
        ]);
 
        $hashedPassword = Auth::user()->password;
        if (bcrypt($request->oldpassword , $hashedPassword)) {
            if (bcrypt($request->newpassword , $hashedPassword)) {
 
                $users = Auth::user()->id;
                $users->password = bcrypt($request->newpassword);
                $users->save();
                session()->flash('message','password updated successfully');
                return redirect()->back();
            }
            else{
                session()->flash('message','new password can not be the old password!');
                return redirect()->back();
            } 
        }
        else{
            session()->flash('message','old password doesnt matched');
            return redirect()->back();
        }
    }

    // Logout
    /**
    * Logout user (Revoke the token)
    *
    * @return [string] message
    */
    public function logout(Request $request)
    {   
        $request->user()->tokens()->delete();

        return response()->json([
        'message' => 'Successfully logged out'
        ]);

    }

    public function userList()
    {
        $userlist = DB::table('users')
            ->join('roles','users.roles_id','=','roles.id')
            ->select('users.id','users.fullname','users.email','users.roles_id','roles.name as role')
            ->get();

        return $userlist;
    }
}