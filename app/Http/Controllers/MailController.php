<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Mail;

class MailController extends Controller
{
    public function index()
    {
    $query = Mail::query();
    $query->when(request('search_date','search_ref_no','search_description'), function($query){
    $query->whereDate('date', 'like', '%' . request('search_date') . '%');
    $query->where('ref_no', 'like', '%' . request('search_ref_no') . '%');
    $query->where('description', 'like', '%' . request('search_description') . '%');
  });
  return $query->orderBy('id','asc')->get();

        // $mails = Mail::all(['id','date','ref_no',
        // 'recipient_add','description','total_amount','incoming',
        // 'paid_amount','due_date','outgoing_date','pic']);
        // return response()->json($mails);




    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|string',
            'ref_no' => 'required|string',
            'recipient_add' => 'required|string',
            'description' => 'required|string',
            'total_amount' => 'required|string',
            'incoming' => 'required|string',
            'paid_amount' => 'required|string',
            'due_date' => 'required|string',
            'outgoing_date' => 'required|string',
            'pic' => 'required|string',

        ]);

        $mail = new Mail([
            'date'  => $request->date,
            'ref_no'  => $request->ref_no,
            'recipient_add'  => $request->recipient_add,
            'description'  => $request->description,
            'total_amount'  => $request->total_amount,
            'incoming'  => $request->incoming,
            'paid_amount'  => $request->paid_amount,
            'due_date'  => $request->due_date,
            'outgoing_date'  => $request->outgoing_date,
            'pic'  => $request->pic,

        ]);

        if($mail->save()){
            return response()->json([
            'message' => 'Successfully created mail!',
            ],201);
        }
        else{
            return response()->json(['error'=>'Provide proper details']);
        }
    }

    public function show(Mail $mail)
    {
        return response()->json($mail);
    }

    public function destroy(Mail $mail)
    {
        $mail->delete();
        return response()->json([
            'message'=>'Mail Deleted Successfully!!'
        ]);
    }

    public function update(Request $request, Mail $mail)
    {
        $mail->fill($request->post())->save();
        return response()->json([
            'message'=>'Mail Updated Successfully!!',
            'mail'=>$mail
        ]);
    }
}
