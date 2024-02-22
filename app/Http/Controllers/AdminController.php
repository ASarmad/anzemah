<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Evidance;
use App\Models\Certificate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins= User::where('role','admin')->count();
        $users= User::where('role','user')->count();
        $clients=Client::count();

        return view('admin.dashboard',
        ['admins' => $admins,    
        'users'=>$users,
        'clients'=>$clients
        ]);
    }

    
    public function certificateRead()
    {
        $certificate = certificate::get();
        return view('admin.viewCertificate', ['certificate' => $certificate]);
    }

    public function viewFullClient(string $id,Request $request)
    {
        //
        $client = Client::where('id',$id)->first(); 
        $certificate=Certificate::where('client_id',$client->id)->first();
        $evidance = Evidance::where('certificate_id',$certificate->id)->paginate(10);

        $topics=Evidance::select('topic')->where('certificate_id', $certificate->id)->distinct()->get();

        $diff=Carbon::parse($certificate->targetdate);
        $now=Carbon::now();
        $remining=$diff->diffInDays($now);

        if($request->ajax()){
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $topic = $request->get('topic');
            $filter = $request->get('filter');
            if($topic=="reset"){
                $evidance = Evidance::query()
                        ->where('certificate_id',$certificate->id)
                        ->where('question', 'like', '%'.$query.'%')
                        ->orderBy($sort_by, $sort_type)
                        ->paginate($filter);
            }else{
                $evidance = Evidance::query()
                        ->where('certificate_id',$certificate->id)
                        ->where('topic',$topic)
                        ->where('question', 'like', '%'.$query.'%')
                        ->orderBy($sort_by, $sort_type)
                        ->paginate($filter);
            }
            return view('admin.layouts.search', compact('evidance','client'))->render();
        }

        return view('admin.viewFullClient', ['client' => $client,'certificate'=>$certificate,'evidance'=>$evidance,'topics'=>$topics,'remining'=>$remining]);
    }
    public function viewClientUploads(string $id,string $file)
    {
        //
        $evidance = Evidance::where('id',$file)->first();
        return view('admin.viewClientUploads', ['evidances'=>$evidance]);
        
    }

    public function ChangeUploadStatus(Request $request,string $id)
    {
        //
        $evidance = Evidance::where('id',$id)->first();
        $evidance->status=$request->input('changestatus');
        $evidance->save();
        return redirect()->back();
    }
}
