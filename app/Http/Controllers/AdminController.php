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

    public function clientCreate(Request $request)
    {
        // Validation rules
        $rules = [
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|min:6',
            'comfirmpassword' => 'required|same:password',
            'address' => 'required',
            'phone' => 'required|numeric',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Add certificate validation rules if the certificate checkbox is checked
        if ($request->has('certificateCheck')) {
            $rules += [
                'year' => 'required',
                'status' => 'required|in:pending,valid,expired',
                'type' => 'required',
                'version' => 'required',
            ];

            // Add additional rules for the validInputs section if the status is 'valid'
            if ($request->input('status') == 'valid' OR $request->input('status') == 'expired') {
                $rules += [
                    'ref_number' => 'required',
                    'lastdate' => 'required|date',
                    'targetdate' => 'required|date',
                    'certificate_pdf' => 'nullable|mimes:pdf|max:2048',
                ];
            }
        }
        
        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        //  Here to Crate a new Client  //
        $client=$request->all();

        if ($request->hasFile('logo')) {
        $file = $request->file('logo'); 
        $logo = $file->getClientOriginalName(); 
        $file->move('files', $logo); 
        $client['logo'] = $logo; 
        $createdClient=Client::create(
            ['name'=>$request->name,'address'=>$request->address,'phone'=>$request->phone,'logo'=>$logo]);
        }
        //  Here to Crate a new user for the client  //     
        $hashedPassword=Hash::make($request->password);
        $createdClient->users()->create(
            ['name'=>$request->name,'email'=>$request->email,'password'=>$hashedPassword,'role'=>'user']); 

        //  Here to Crate a new certificate for the client  //
        if ($request->hasFile('certificate_pdf')) {
        $file = $request->file('certificate_pdf'); 
        $certificate_pdf = $file->getClientOriginalName(); 
        $file->move('files', $certificate_pdf); 
        $createdClient->certificates()->create(
            ['status'=>$request->status,'type'=>$request->type,'year'=>$request->year,'version'=>$request->version,
             'ref_number'=>$request->ref_number,'targetdate'=>$request->targetdate,'lastdate'=>$request->lastdate,
             'certificate_pdf'=>$certificate_pdf
            ]); 
        }
        return redirect()->back(); // kda ana 3mlt refresh ll sf7a 
    }

    public function clientRead()
    {
        $client = Client::get();
        return view('admin.viewClient', ['client' => $client]);
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
            return view('user.layouts.search', compact('evidance'))->render();
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
