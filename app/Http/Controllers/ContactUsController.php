<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate(
            ['subject' => 'required|string','message' => 'required|string']
            ,
            ['subject.required'=>'Please fill all data.','message.required'=>'Please fill all data.']
        );
        $input=$request->all();

        $input['client_id'] = auth()->user()->client_id; // zbt al relation
        $input['email']=auth()->user()->email;
        $input['subject']=$request->subject;
        $input['message']=$request->message;

        ContactUs::create($input); 
        return redirect()->back(); // kda ana 3mlt refresh ll sf7a 
    }
}
