<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*
    *   The function is to update the User password in the User tabel.
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
}
