<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userModel;
use Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginUser(Request $request)
{
     $user = userModel::where('email','=', $request->email)->first();
     if($user){
        if($user->password==$request->password){
             $request->session()->put('loginId',$user->id); 
             return redirect('orders');
        }else{
            return back()->with('error', 'Password is not correct');
        }
     }
     else{
        return back()->with('error', 'User not found');
     }
}
    public function dashboard(){
        $data=array();
        if(Session::has('loginId')){
            $data=userModel::where('id','=', Session::get('loginId'))->first();
        }
        return view('orders', compact('data'));
    }

    public function logout(){
        
            if (Session::get('loginId')){
                Session::pull('loginId');
                return redirect('login');
            }
     
    }

}
