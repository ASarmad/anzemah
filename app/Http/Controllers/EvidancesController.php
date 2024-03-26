<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Evidance;
use App\Models\Client;

class EvidancesController extends Controller
{
    /*
    *  --------------------------------------- USER FUNCTIONS --------------------------------------- *
    */
    /*
    /*
    *   The function is to read an Evidance from the Evidance tabel.
    */
    public function evidanceRead(Request $request)
    {
        // Get The Current Client Certificate //
        $certificate =Certificate::where('client_id',auth()->user()->client_id)->whereIn('status',['Valid','Pending'])->first();
        // Get all the Evidances of the Curent selected Certificate //
        $evidance = Evidance::where('certificate_id',$certificate->id)->paginate(10);
        // Search Filter for Evidances (Works on Current Selected Certificate) //
        $topics=Evidance::select('topic')->where('certificate_id',$certificate->id)->distinct()->get();
        
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
            // This Return is for The Search Table //
            return view('user.layouts.search', compact('evidance'))->render();
        }
        // Return to The Original Page in Route //
        return view('user.evidance', ['evidance' => $evidance,'topics'=>$topics]); 
    }
    /*
    *   The function is to read single Evidance from the Evidance tabel.
    */
    public function singleEvidanceRead($id){
        $year = [];
        $expiredFiles = [];

        $evidances = Evidance::whereId($id)->first();
        $question_number=$evidances->number;
        $certificate=Certificate::where('id',$evidances->certificate_id)->first();
        $client=Client::where('id',$certificate->client_id)->first();
        //dd($client->certificates);

        foreach($client->certificates as $certificate){
            if($certificate->status=='Expired'){
                $certificateExpiredYear[]=$certificate->year;
                foreach($certificate->evidances as $evidance){
                    if($evidance->number==$question_number){
                        return view('user.upload', ['evidances' => $evidances,'year'=>$certificateExpiredYear,'expiredFiles'=>$evidance->uploads]);
                    }
                }
            }
            //dump($record->status);
        }
        //dd($client);
        return view('user.upload', ['evidances' => $evidances, 'year' => $year, 'expiredFiles' => $expiredFiles]);    
    }
    /*
    *  --------------------------------------- ADMIN FUNCTIONS --------------------------------------- *
    */
    /*
    *   The function is to view the client uploads from Evidance tabel.
    */
    public function viewClientUploads(string $id,string $file)
    {
        $evidance = Evidance::where('id',$file)->first();
        return view('admin.viewClientUploads', ['evidances'=>$evidance]);
        
    }
    /*
    *   The function is to change the Evidance status from Evidance tabel.
    */
    public function ChangeUploadStatus(Request $request,string $id)
    {
        $evidance = Evidance::where('id',$id)->first();
        $evidance->status=$request->input('changestatus');
        $evidance->save();
        return redirect()->back();
    }
}
