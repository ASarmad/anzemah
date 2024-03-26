<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientCreateUpdateRequest;
use App\Models\Client;
use App\Models\Certificate;
use App\Models\Evidance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /*
    *  --------------------------------------- USER FUNCTIONS --------------------------------------- *
    */
    /*
    *   The function is to read the Client information from the Client tabel.
    */
    public function index()
    {
        //
        // get OR all they back a collection / array of records
        // first get only single record
        //
        // Get the Client //
        $client= Client::where('id',auth()->user()->client_id)->first(); 
        // Get Client Certificate //
        $certificate=Certificate::where('client_id',$client->id)->whereIn('status',['Valid','Pending'])->first();
        // Get Evidance of the Certificate //
        $pass=Evidance::where('certificate_id',$certificate->id)->where('status','Pass')->count();
        $pending=Evidance::where('certificate_id',$certificate->id)->where('status','Pending')->count();
        $nothing=Evidance::where('certificate_id',$certificate->id)->where('status','Not Uploaded')->count();
        $passcomment=Evidance::where('certificate_id',$certificate->id)->where('status','Pass Comment')->count();
        $notcomplete=Evidance::where('certificate_id',$certificate->id)->where('status','In Complete')->count();
        
        $diff=Carbon::parse($certificate->targetdate);
        $now=Carbon::now();
        $remining=$diff->diffInDays($now);

        return view('user.dashboard',
        ['client' => $client,
        'certificate'=>$certificate,
        'pass'=>$pass,
        'pending'=>$pending,
        'nothing'=>$nothing,
        'passcomment'=>$passcomment,
        'notcomplete'=>$notcomplete,
        'remining'=>$remining
        ]);
    }
    /*
    *  --------------------------------------- ADMINSTRATION FUNCTIONS --------------------------------------- *
    */
    /*
    *   The function is to create new client in the Clients tabel.
    */
    public function clientCreate(ClientCreateUpdateRequest $request)
    {   
        //  Here to Crate a new Client  //
        try{ 
            $client=$request->all();

            $client['email'] = $request->email; 
            $client['name'] = $request->name; 
            $hashedPassword=Hash::make($request->password);
            $client['password'] = $hashedPassword;
            $client['address'] = $request->address;
            $client['phone'] = $request->phone; 
            if ($request->hasFile('logo')) {
                $file = $request->file('logo'); 
                $logo = $file->getClientOriginalName(); 
                $file->move('img/logo', $logo); 
                $client['logo'] = $logo; 
            }
            $createdClient=Client::create($client);
            $createdClient->users()->create(['name'=>$request->name,'email'=>$request->email,'password'=>$hashedPassword,'role'=>'user']);

            return response()->json('Data has been added successfully', 200);
        } catch (\Throwable $th) {
            //dd($th->getMessage());
            return response()->json('Error , please try again later', 400);
        } 
    }

    /*
    *   The function is to read clients in the Clients tabel.
    */
    public function clientRead()
    {
        $client = Client::get();
        return view('admin.viewClient', ['client' => $client]);
    }
    //TODO:WORKING HERE //
    public function clientFullRead($id)
    {
        $client = Client::where('id',$id)->first(); 
        $certificate=Certificate::where('client_id',$client->id)->where('status','Valid')->first();
        $pass=Evidance::where('certificate_id',$certificate->id)->where('status','Pass')->count();
        $passcomment=Evidance::where('certificate_id',$certificate->id)->where('status','Pass Comment')->count();

        $oldCertificates=Certificate::where('client_id',$client->id)->whereNot('status','Valid')->get();

        $diff=Carbon::parse($certificate->targetdate);
        $now=Carbon::now();
        $remining=$diff->diffInDays($now);

        return view('admin.viewFullClient', ['client' => $client,'certificate'=>$certificate,'oldCertificates'=>$oldCertificates,'remining'=>$remining,'pass'=>$pass,'passcomment'=>$passcomment]);
    }

    public function clientUpdate(ClientCreateUpdateRequest $request,$id,$oldLogo)
    {
        try{
            $client = Client::findOrFail($id);
            $client->name=$request->name;
            $client->address=$request->address;
            $client->phone=$request->phone;
            if ($request->hasFile('logo')) {
                File::delete(public_path("img/logo/{$oldLogo}"));
                $file = $request->file('logo'); 
                $logo = $file->getClientOriginalName(); 
                $file->move('img/logo', $logo); 
                $client->logo = $logo; 
            }
            $client->update();

            return response()->json('Data has been Updated successfully', 200);
        } catch (\Throwable $th) {
            //dd($th->getMessage());
            return response()->json('Error , please try again later', 400);
        }
    }

    /*
    *   The function is to delete client in the Clients tabel.
    */
    public function clientDelete($id)
    {
        try{
            $client = Client::findOrFail($id);
            $client->delete(); 
            return redirect()->back();
        } catch (\Throwable $th) {
            //dd($th->getMessage());
            return response()->json('Error , please try again later', 400);
        }
    }
    
}
