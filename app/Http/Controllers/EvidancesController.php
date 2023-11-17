<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Evidance;

class EvidancesController extends Controller
{
    /*
    *   The function is to read an Evidance from the Evidance tabel.
    */
    public function evidanceRead(Request $request)
    {
        // Get The Current Client Certificate //
        $certificate =Certificate::where('client_id',auth()->user()->client_id)->first();
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
}
