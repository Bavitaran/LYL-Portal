<?php

namespace App\Http\Controllers;

use App\Models\userdetail;
use Illuminate\Http\Request;

class UserdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUserList(Request $request)
    {
        $request->validate([
            'role' =>'required|string',
            'register_date' =>'required|datetime',
            'fullname' =>'required|string',
            'new_nric' =>'required|integer',
            'passport_no' =>'required|string',
            'gender' =>'required|string',
            'nationality' =>'required|string',
            'company_name' =>'required|string',
            'company_reg_new_no' =>'required|string',
            'company_reg_old_no' =>'nullable|string',
            'registration_add' =>'required|string',
            'business_add' =>'required|string',
            'person_in_charge' =>'required|string',
            'primary_mobile_no' =>'required|string',
            'primary_social_contact_no' =>'required|string',
            'primary_email' =>'required|string|unique:users',
            'primary_add_line_1' =>'required|string',
            'primary_add_line_2' =>'nullable|string',
            'primary_add_line_3' =>'nullable|string',
            'primary_add_state' =>'required|string',
            'primary_add_postcode' =>'required|string',
            'primary_add_country' =>'required|string',
            'secondary_mobile_no' =>'nullable|string',
            'secondary_social_contact_no' =>'nullable|string',
            'secondary_email' =>'nullable|string',
            'secondary_add_line_1' =>'nullable|string',
            'secondary_add_line_2' =>'nullable|string',
            'secondary_add_line_3' =>'nullable|string',
            'secondary_add_state' =>'nullable|string',
            'secondary_add_postcode' =>'nullable|string',
            'secondary_add_country' =>'nullable|string',
        ]);
        $userdetail = new Userdetail([
            'role' => $request -> role,
            'register_date' => $request -> register_date,
            'fullname' => $request -> fullname,
            'new_nric' => $request -> new_nric,
            'passport_no' => $request -> passport_no,
            'gender' => $request -> gender,
            'nationality' => $request -> nationality,
            'company_name' => $request -> company_name,
            'company_reg_new_no' => $request -> company_reg_new_no,
            'company_reg_old_no' => $request -> company_reg_old_no,
            'registration_add' => $request -> registration_add,
            'business_add' => $request -> business_add,
            'person_in_charge' => $request -> person_in_charge,
            'primary_mobile_no' => $request -> primary_mobile_no,
            'primary_social_contact_no' => $request -> primary_social_contact_no,
            'primary_email' => $request -> primary_email,
            'primary_add_line_1' => $request -> primary_add_line_1,
            'primary_add_line_2' => $request -> primary_add_line_2,
            'primary_add_line_3' => $request -> primary_add_line_3,
            'primary_add_state' => $request -> primary_add_state,
            'primary_add_postcode' => $request -> primary_add_postcode,
            'primary_add_country' => $request -> primary_add_country,
            'secondary_mobile_no' => $request -> secondary_mobile_no,
            'secondary_social_contact_no' => $request -> secondary_social_contact_no,
            'secondary_email' => $request -> secondary_email,
            'secondary_add_line_1' => $request -> secondary_add_line_1,
            'secondary_add_line_2' => $request -> secondary_add_line_2,
            'secondary_add_line_3' => $request -> secondary_add_line_3,
            'secondary_add_state' => $request -> secondary_add_state,
            'secondary_add_postcode' => $request -> secondary_add_postcode,
            'secondary_add_country' => $request -> secondary_add_country,
        ]);

        if ($userdetail->save()){
            return response()->json([
                'message'=>'Successfully create user',
            ],201);
        }
        else{
            return response()->json(['error'=>'Failed to create user.']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userdetail  $userdetail
     * @return \Illuminate\Http\Response
     */
    public function userlist(userdetail $userdetail)
    {
        $userlist = userdetail::select('id', 'role', 'fullname', 'company_name','person_in_charge')
            ->orderBy('id', 'asc')
            ->get();
        return $userlist;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userdetail  $userdetail
     * @return \Illuminate\Http\Response
     */
    public function userDetailEdit(userdetail $userdetail)
    {
        return $userdetail;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userdetail  $userdetail
     * @return \Illuminate\Http\Response
     */
    public function updateUserDetail(Request $request, userdetail $userdetail, $id)
    {
        $request->validate([
            'role' =>'required|string',
            'register_date' =>'required|datetime',
            'fullname' =>'required|string',
            'new_nric' =>'required|integer',
            'passport_no' =>'required|string',
            'gender' =>'required|string',
            'nationality' =>'required|string',
            'company_name' =>'required|string',
            'company_reg_new_no' =>'required|string',
            'company_reg_old_no' =>'nullable|string',
            'registration_add' =>'required|string',
            'business_add' =>'required|string',
            'person_in_charge' =>'required|string',
            'primary_mobile_no' =>'required|string',
            'primary_social_contact_no' =>'required|string',
            'primary_email' =>'required|string|unique:users',
            'primary_add_line_1' =>'required|string',
            'primary_add_line_2' =>'nullable|string',
            'primary_add_line_3' =>'nullable|string',
            'primary_add_state' =>'required|string',
            'primary_add_postcode' =>'required|string',
            'primary_add_country' =>'required|string',
            'secondary_mobile_no' =>'nullable|string',
            'secondary_social_contact_no' =>'nullable|string',
            'secondary_email' =>'nullable|string',
            'secondary_add_line_1' =>'nullable|string',
            'secondary_add_line_2' =>'nullable|string',
            'secondary_add_line_3' =>'nullable|string',
            'secondary_add_state' =>'nullable|string',
            'secondary_add_postcode' =>'nullable|string',
            'secondary_add_country' =>'nullable|string',
        ]);

        $userdetail->update($request->all());

        return redirect()->route('userupdate')->with('Success', 'Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userdetail  $userdetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(userdetail $userdetail)
    {
        //
    }
}
