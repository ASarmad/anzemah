<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Certificate;
use App\Models\Evidance;
use Carbon\Carbon;

class ClientController extends Controller
{
    /**
     *  Read the Client information from the Client tabel.
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
}
