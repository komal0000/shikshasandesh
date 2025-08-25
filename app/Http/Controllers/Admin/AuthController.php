<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function login(Request $request){
        if($request->getMethod()=="POST"){
            $data=$request->validate([
                'email'=>'email|required',
                'password'=>'required'
            ]);
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$request->filled(('me')))){
                return redirect()->route('admin.dashboard.index')->with('message',"Login Sucessfull");
            }else{
                return redirect()->back()
                ->with('error','Email and password Combination Wrong.')
                ->withInput(['email']);
            }
        }else{
            return view('admin.login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }



}
