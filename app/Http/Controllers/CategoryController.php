<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function documents(Request $request){
        try{
            if($request->hasFile('img')){
                $file = $request->file('img');
                $file_name = time(). '.' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $file_name);
                return response()->json([
                    'message'=>'File uploaded successfully! '
                ], 200);
            }
        }catch(\Exception $e){
            return response()->json([
                'message'=>$e->getMessage()
            ]);
        }
    }
}
