<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Matter;

class MatterController extends Controller
{


   public function index() {

    $query = Matter::query();

    $query->when(request('search_client','search_file_ref','search_file_status','search_date_from','search_date_to'), function($query){
    $query->where('client_company', 'like', '%' . request('search_client') . '%');
    $query->where('file_ref', 'like', '%' . request('search_file_ref') . '%');
    $query->where('status', 'like', '%' . request('search_file_status') . '%');

    $query->whereDate('created_at', 'like', '%' . request('search_date_from') . '%');


  });
  return $query->orderBy('id','asc')->get();

// $matters = Matter::select('id', 'date', 'file_ref');
// return datatables($matters)->make(true);

}

public function export(Request $request){
    return Matter::download(new DataExport($data), $filename);
}

	// public function authLoginweb($email, $pwd)
	// {
	// 	$result = $this->db->select('*')
	// 		->where('email', $email)
	// 		->where('superUser', 0)
	// 		->get($this->table)
	// 		->row();
	// 	if (!empty($result)) {
	// 		if (isset($pwd)) {
	// 			if (password_verify($pwd, $result->pwd)) {
	// 				return array(
	// 					'status' => true,
	// 					'message' => $result
	// 				);
	// 			} else {
	// 				// return FALSE if you password is invalid
	// 				return array(
	// 					'status' => false,
	// 					'message' => 'password is invalid'
	// 				);
	// 			}
	// 		} else {
	// 			// return FALSE if you password is invalid
	// 			return array(
	// 				'status' => false,
	// 				'message' => 'password is required'
	// 			);
	// 		}
	// 	} else {
	// 		// return FALSE if you are not register
	// 		return array(
	// 			'status' => false,
	// 			'message' => 'you are not register'
	// 		);
	// 	}
	// }

    public function store(Request $request)
    {
        $request->validate([
            'matter_type' => 'required|string',
            'client_company' => 'required|string',
            'description' => 'required|string',
            'file_group' => 'required|string',
            'control_account' => 'required|string',
            'pic' => 'required|string',
            'lawyer' => 'required|string',
            'task_assign' => 'required|string',
            'task_recipient' => 'required|string',
            'file_ref' => 'required|string',
            'remark' => 'required|string',
            'purchaser_name' => 'required|string',
            'purchaser_company' => 'required|string',
            'vendor_name' => 'required|string',
            'vendor_copmany' => 'required|string',
            'status' => 'nullable|string',
        ]);

        $matter = new Matter([
            'matter_type'  => $request->matter_type,
            'client_company'  => $request->client_company,
            'description'  => $request->description,
            'file_group'  => $request->file_group,
            'control_account'  => $request->control_account,
            'pic'  => $request->pic,
            'lawyer'  => $request->lawyer,
            'task_assign'  => $request->task_assign,
            'task_recipient'  => $request->task_recipient,
            'file_ref'  => $request->file_ref,
            'remark'  => $request->remark,
            'purchaser_name'  => $request->purchaser_name,
            'purchaser_company'  => $request->purchaser_company,
            'vendor_name'  => $request->vendor_name,
            'vendor_copmany'  => $request->vendor_copmany,
            'status'  => $request->status,
        ]);

        if($matter->save()){
            return response()->json([
            'message' => 'Successfully created matter!',
            ],201);
        }
        else{
            return response()->json(['error'=>'Provide proper details']);
        }
    }

    public function show(Matter $matter)
    {
        return response()->json($matter);
    }

    public function destroy(Matter $matter)
    {
        $matter->delete();
        return response()->json([
            'message'=>'Matter Deleted Successfully!!'
        ]);
    }

    public function update(Request $request, Matter $matter)
    {
        $matter->fill($request->post())->save();
        return response()->json([
            'message'=>'Matter Updated Successfully!!',
            'matter'=>$matter
        ]);
    }

}
