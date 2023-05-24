<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Relevant;

class RelevantController extends Controller
{
    public function index() {
        $relevants = Relevant::all(['id','link']);
        return response()->json($relevants);
}


public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|string',
        ]);

        $relevant = new Relevant([
            'link'  => $request->link,
        ]);

        if($relevant->save()){
            return response()->json([
            'message' => 'Successfully created relevant!',
            ],201);
        }
        else{
            return response()->json(['error'=>'Provide proper details']);
        }
    }

    public function show(Relevant $relevant)
    {
        return response()->json($relevant);
    }

    public function destroy(Relevant $relevant)
    {
        $relevant->delete();
        return response()->json([
            'message'=>'relevant Deleted Successfully!!'
        ]);
    }

    public function update(Request $request, Relevant $relevant)
    {
        $relevant->fill($request->post())->save();
        return response()->json([
            'message'=>'relevant Updated Successfully!!',
            'relevant'=>$relevant
        ]);
    }
}
