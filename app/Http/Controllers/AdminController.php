<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Evidance;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins= User::where('role','admin')->count();
        $users= User::where('role','user')->count();

        return view('admin.dashboard',
        ['admins' => $admins,    
        'users'=>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function addClient()
    {
        //
        return view('admin.addClient');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function viewClient()
    {
        //
        $client = User::where('role','user')->get();
        return view('admin.viewClient', ['client' => $client]);
    }
    public function viewFullClient(string $id,Request $request)
    {
        //
        $user = User::where('id',$id)->first(); //gbt al user info
        $client = Client::where('id',$user->client_id)->first(); //gbt al client info
        $evidance = Evidance::where('client_id',$client->id)->paginate(10);
        //dd($evidance);
        //////////////////////////////////////////////////////////////////////////
        //$evidance = Evidance::query()->get();
        if($request->ajax()){
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $evidance = Evidance::query()
                        ->where('client_id',$client->id)
                        ->where('question', 'like', '%'.$query.'%')
                        ->orderBy($sort_by, $sort_type)
                        ->paginate(10);
            return view('user.layouts.search', compact('evidance'))->render();
        }

        return view('admin.viewFullClient', ['user'=>$user,'client' => $client,'evidance'=>$evidance]);
    }
    public function viewClientUploads(string $id,string $file)
    {
        //
        $evidance = Evidance::where('id',$file)->first();
        return view('admin.viewClientUploads', ['evidances'=>$evidance]);
        
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
}
