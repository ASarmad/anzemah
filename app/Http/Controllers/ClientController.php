<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Evidance;
use App\Models\Upload;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //get OR all they back a collection / array of records
        // first get only single record
        //$client = DB::table('clients')->where('id',auth()->user()->client_id)->first();
        

            $client= Client::where('id',auth()->user()->client_id)->first();

            $accept=Evidance::where('client_id',auth()->user()->client_id)->where('status','accept')->count();
            $pending=Evidance::where('client_id',auth()->user()->client_id)->where('status','Pending')->count();
            $nothing=Evidance::where('client_id',auth()->user()->client_id)->where('status','Not Uploaded')->count();
            $acceptcomment=Evidance::where('client_id',auth()->user()->client_id)->where('status','acceptcomment')->count();
            $notcomplete=Evidance::where('client_id',auth()->user()->client_id)->where('status','notcomplete')->count();
            
            $diff=Carbon::parse($client->targetdate);
            $now=Carbon::now();
            $remining=$diff->diffInDays($now);

            return view('user.dashboard',
            ['client' => $client,
            'accept'=>$accept,
            'pending'=>$pending,
            'nothing'=>$nothing,
            'acceptcomment'=>$acceptcomment,
            'notcomplete'=>$notcomplete,
            'remining'=>$remining
            ]);
       

        //return view('user.dashboard');
    }
    public function readEvidance(Request $request)
    {
        //dd(auth()->user()->client_id);
        $evidance = Evidance::where('client_id',auth()->user()->client_id)->paginate(10);
        //dd($evidance);
        //////////////////////////////////////////////////////////////////////////
        //$evidance = Evidance::query()->get();
        if($request->ajax()){
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $evidance = Evidance::query()
                        ->where('client_id',auth()->user()->client_id)
                        ->where('question', 'like', '%'.$query.'%')
                        ->orderBy($sort_by, $sort_type)
                        ->paginate(10);
            return view('user.layouts.search', compact('evidance'))->render();
        }
        //////////////////////////////////////////////////////////////////////////
        return view('user.evidance', ['evidance' => $evidance]); 
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            ['file' => 'required|file|min:0|max:6144',],//6MB
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
        $chnageStatus=Evidance::where('client_id',auth()->user()->client_id)->where('id',$request->route()->parameter('id'))->first();
        $chnageStatus->status='Pending';
        $chnageStatus->save();


        // redirect to same page (refresh) //
        return redirect()->back();
    }

    public function storeComment(Request $request){

        $input=$request->all();

        //dd($input);
        $input['comment_id'] = $request->route()->parameter('id'); // zbt al relation
        $input['comment']=$request->comment;
        $input['upload']=$request->upload;
        $input['user']=auth()->user()->name;
        
        Comment::create($input); 
        return redirect()->back(); // kda ana 3mlt refresh ll sf7a 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //$client=Client::findorfail($id);
        //return view('user.dashboard')->with('client', $client);
        //return view('clients.show',compact('client')); //hna yro7 ll view da b al record
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Remove the uploaded file from the database
     */
    public function destroyFile(string $id,string $fileid)
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

    /**
     * Remove the comment on a spisific evidance 
     */
    public function destroyComment(string $id,string $commentid)
    {
        $comment=Comment::findOrFail($commentid);
        $comment->delete();
        return redirect()->back();
    }
}
