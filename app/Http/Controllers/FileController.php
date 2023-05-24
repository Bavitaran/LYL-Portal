<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FileUpload;
class FileController extends Controller
{
      public function index(){
        $fileuploads = FileUpload::all(['id','name','description','document_name','created_at']);
        return response()->json($fileuploads);
      }

      public function upload(Request $request){

            $request->validate([
               'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048',
               'description' => 'required|string',
               'document_name' => 'required|string',
            ]);

            $fileUpload = new FileUpload(['description' => $request->description,'document_name' => $request->document_name]);

            if($request->file()) {


                $file_name = time().'_'.$request->file->getClientOriginalName();
                $file_path = $request->file('file')->move(public_path('uploads'), $file_name);
                $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
                $fileUpload->path = '/storage/' . $file_path;
                $fileUpload->save();

                return response()->json(['success'=>'File uploaded successfully.']);
            }
       }

       public function destroy(FileUpload $fileupload)
    {
        $fileupload->delete();
        return response()->json([
            'message'=>'Documnet Deleted Successfully!!'
        ]);
    }
}
