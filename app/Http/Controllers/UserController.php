<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_login(Request $req)
   
   {
    $submit=$req["submit"];
    if($submit=="submit"){
     $req->validate([
      'email'=>'required|email',
      'password'=>'required',
     ]

 
    );
     if(\Auth::attempt($req->only('email','password'))){

      return redirect('/home');
     }else{
      return redirect('/login')->withError('Votre email ou votre mot de passe est incorect');
     }
    }
      return view('admin.admin_login');
   }
   public function user_register(Request $req){
    $submit=$req["submit"];
    if($submit=="submit"){
     $req->validate([
      'name'=>'required',
      'email'=>'required|email',
      'password'=>'required',
     ]
    );
    $register=new User;
    $register->name=$req['name'];
    $register->email=$req['email'];
    $register->password=Hash::make($req['password']);
    $register->save();
    $notification=array(
        'message'=>'Mot de passe changer avec success',
        'alert-type'=>'success',
    );
    return redirect('/login')->with($notification);
} 
return view('admin.admin_register') ;

}
 
}
