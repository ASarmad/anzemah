<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Evidance;
use App\Models\Upload;
use Illuminate\Support\Facades\File;

class UploadsController extends Controller
{
    /*
    *   The function is to create an new upload in the Uploads tabel.
    */
    public function uploadCreate(Request $request)
    {
        // Vlaidation on the file need to be uploaded //
        $request->validate(
            ['file' => 'required|file|min:0|max:6144',], //6MB file only 
            ['file.required'=>'Please upload a File',
            'file.max'=>'The file is larger than 6MB, Please upload another file.']
        );
        $input = $request->all();
    
        if ($request->hasFile('file')) { 
            $file = $request->file('file'); //kda ana mskt al file mn al request ale gy mn al form
            $name = $file->getClientOriginalName(); // gbt asm al file
            $file->move('files', $name); // 5znt al file f folder asmh (files) gwa al public
            $input['path'] = $name; // 5znt asm al file f al database 3shan al user yshof al file atrf3
            $input['evidance_id'] = $request->route()->parameter('id'); // zbt al relation
        }
        Upload::create($input); 

        // change the Status after upload a file //
        $certificate =Certificate::where('client_id',auth()->user()->client_id)->first();
        $chnageStatus=Evidance::where('certificate_id',$certificate->id)->where('id',$request->route()->parameter('id'))->first();
        $chnageStatus->status='Pending';
        $chnageStatus->save();

        // redirect to same page (refresh) //
        return redirect()->back();
    }

    /*
    *   The function is to destroy an upload in the Uploads tabel.
    */
    public function uploadDestroy(string $id,string $fileid)
    {
        // find the file and delete it from database //
        $file=Upload::findOrFail($fileid);
        
        File::delete(public_path("files/{$file->path}"));// ana ms7t kda al file mn al public
                              
        $file->delete();

        // Check if there is any file left in evidance //
        // change status to not uploaded when he delete all files uploaded in single evidance //
        $evidance = Evidance::where('id',$id)->first();
        //dd($evidance->uploads->isEmpty());
        if($evidance->uploads->isEmpty())
        {
            $evidance->status='Not Uploaded';
            $evidance->save();
        }

        return redirect()->back();
        //dd($file);
    }
}
