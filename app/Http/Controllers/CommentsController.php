<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    /*
    *   The function is to create a new comment in comments tabel.
    */
    public function commentCreate(Request $request){

        $input=$request->all();
        $input['evidance_id'] = $request->route()->parameter('id'); // zbt al relation
        $input['comment']=$request->comment;
        $input['upload']=$request->upload;
        $input['user']=auth()->user()->name;
        
        Comment::create($input); 
        return redirect()->back(); // kda ana 3mlt refresh ll sf7a 
    }

    /*
    *   The function is to delete a comment in comments tabel.
    */
    public function commentDestroy(string $id,string $commentid)
    {
        $comment=Comment::findOrFail($commentid);
        $comment->delete();
        return redirect()->back();
    }
}
