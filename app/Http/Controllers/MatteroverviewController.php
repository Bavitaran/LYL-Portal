<?php

namespace App\Http\Controllers;

use App\Models\matteroverview;
use Illuminate\Http\Request;

class MatteroverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matteroverview = matteroverview::with('mattertype')->get();
        return $matteroverview;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMatter(Request $request)
    {
         $request->validate([
            'mattertypes_id',
            'open_file_date',
            'file_ref',
            'related_file_ref',
            'file_status',
            'agency',
            'agent_name',
            'bank_detail',
            'contact',
            'client_id',
            'vendor_id',
            'purchaser_id',
            'developer_id',
            'financier_id',
            'property_id',
            'searches_id',
            'caveats_id',
            'agreement_id',
            'originaldoc_id',
         ]);

         $matteroverview = new Matteroverview([
            'mattertypes_id' => $request->mattertypes_id,
            'open_file_date' => $request->open_file_date,
            'file_ref' => $request->file_ref,
            'related_file_ref' => $request->related_file_ref,
            'agency' => $request->agency,
            'agent_name' => $request->agent_name,
            'bank_detail' => $request->bank_detail,
            'contact' => $request->contact,
            'client_id' => $request->client_id,
            'vendor_id' => $request->vendor_id,
            'purchaser_id' => $request->purchaser_id,
            'developer_id' => $request->developer_id,
            'financier_id' => $request->financier_id,
            'property_id' => $request->property_id,
            'searches_id' => $request->searches_id,
            'caveats_id' => $request->caveats_id,
            'agreement_id' => $request->agreement_id,
            'originaldoc_id' => $request->originaldoc_id,
         ]);

         if ($matteroverview->save()){
             return response()->json(['message' => 'Successfully create matter!'],201);
         }
         else{
             return response()->json(['error'=>'Failed to create matter'],400);
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
     * @param  \App\Models\matteroverview  $matteroverview
     * @return \Illuminate\Http\Response
     */
    public function matterlist(matteroverview $matteroverview)
    {
        $matterList = matteroverview::select('id', 'file_ref', 'agent_name', 'contact', 'open_file_date')
            ->orderBy('id', 'asc')
            ->get();
        return $matterList;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\matteroverview  $matteroverview
     * @return \Illuminate\Http\Response
     */
    public function edit(matteroverview $matteroverview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\matteroverview  $matteroverview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, matteroverview $matteroverview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\matteroverview  $matteroverview
     * @return \Illuminate\Http\Response
     */
    public function destroy(matteroverview $matteroverview)
    {
        //
    }
}