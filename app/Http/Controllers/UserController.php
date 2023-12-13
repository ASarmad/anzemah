<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCreateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
     /*
    *  --------------------------------------- ADMINSTRATION FUNCTIONS --------------------------------------- *
    */
    /*
    *   The function is to update the User password in the Users tabel.
    */
    public function passwordUpdate(Request $request)
    {
        // $request->validate(
        //     ['password.required'=>'Please check the password and try again']
        // );
        $password = $request->get('password');
        $comfirm_password = $request->get('comfirm_password');
        if($password==$comfirm_password){

            $user =User::where('id',auth()->user()->id)->first();
            $hashed_passowrd =Hash::make($password);
            $user->password=$hashed_passowrd;
            $user->save();

            return redirect()->back();
        }else{
            // TODO: HERE TO SAY THAT PASSWORDS IS NOT MATCHED
            return redirect()->back();
        }
    }

    /*
    *  --------------------------------------- ADMINSTRATION FUNCTIONS --------------------------------------- *
    */
    /*
    *   The function is to create new admin in the Users tabel.
    */
    public function adminCreate(AdminCreateRequest $request){
        try{
            $hashedPassword=Hash::make($request->password);
            User::create(['clinet_id'=>null,'name'=>$request->name,'email'=>$request->email,'role'=>'admin','password'=>$hashedPassword]);
            return response()->json('Data has been added successfully', 200);
        } catch (\Throwable $th) {
            //dd($th->getMessage());
            return response()->json('Error , please try again later', 400);
        }
    }
     /*
    *   The function is to read the admins in from the Users tabel.
    */
    public function adminRead(){
        $admin = User::where('role','admin')->get();
        return view('admin.viewAdmin', ['admin' => $admin]);
    }

    /*
    *   The function is to update the admins data in the Users tabel.
    */
    public function adminUpdate(){
       
    }

    /*
    *   The function is to soft delete an admin in from the Users tabel.
    */
    public function adminDelete(){
       
    }
    
}
