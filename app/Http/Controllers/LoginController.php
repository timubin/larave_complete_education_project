<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;

class LoginController extends Controller
{
    function LoginIndex(){
        return view('Layout.Login');
    }

    function onLogin(Request $request){
      $user=$request->input('user');
      $pass=$request->input('pass');
     $countValue=AdminModel::where('username','=',$user)->where('password','=',$pass)->count();

     if($countValue){
        $request=session()->put('user',$user);
        return 1;
     }else{
        return 0;
     }
    }

    public function Logout () {
        auth()->logout();
        return redirect('/login');
    }


}
