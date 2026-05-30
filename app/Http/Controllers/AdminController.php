<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ProduitModels;
use App\Models\CategorieModels;
use App\Models\client;
use Illuminate\Support\Facades\Auth;
use Socialite;


class AdminController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        // $user->token;
    }

   public function AdminProfile(Request $request){
      $id=Auth::user()->id;
      $profileData=User::find($id);//select where id
   return view('admin.admin_profile_view',compact('profileData'));
   }
   public function AdminProfileStore(Request $request){
      $id=Auth::user()->id;
      $data=User::find($id);
      $data->name=$request->name;
      $data->email=$request->email;
      if($request->file('photo')){
        $file=$request->file('photo');
        @unlink(public_path('upload/admin_images/'.$data->photo));
        $filename=date('YmdHI').$file->getclientOriginalName();
        $file->move(public_path('upload/admin_images'),$filename);
        $data['photo']=$filename;
    
    }
       
    $data->save();
     
      $notification=array(
         'message'=>'Votre Profile est a jour',
         'alert-type'=>'success'
     );
     return redirect()->back()->with($notification);
 }
 public function register(Request $req){
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
    $register->role='user';
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
   public function login(Request $req)
   
   {
  
    $submit=$req["submit"];
    if($submit=="submit"){
     $req->validate([
      'email'=>'required|email',
      'password'=>'required',
     ]

 
    );
     if(Auth::attempt($req->only('email','password'))){
    

      return redirect('/home');
     }else{
      return redirect('/login')->withError('Votre email ou votre mot de passe est incorect');
     }
    }
   
      return view('admin.admin_login');
   }
   public function dashboard()
   {
    $produit =ProduitModels::count();
    $categorie=CategorieModels::count();
    $client=client::count();



      return view('admin.index',compact('produit','categorie','client'));
   }
   public function logout(){
      \Session::flush();
      Auth::logout();
      return redirect('/login');
   } 
   
   
   public function AdminUpdatePassword(Request $request){
      $request->validate([
          'old_password'=> 'required',
          'new_password'=> 'required|confirmed'
      ]);


      if(!Hash::check($request->old_password,auth::user()->password)){
          $notification=array(
              'message'=>"l/'ancienne mot de passe ne correspond pas",
              'aler-type'=>'error'
          );
          return back()->with($notification);

      }
      user::whereId(auth()->user()->id)->update([
          'password'=>Hash::make($request->new_password)
      ]);
      $notification=array(
          'message'=>'Mot de passe changer avec success',
          'alert-type'=>'success'
      );
      return back()->with($notification);

  }
  public function AdminChangePassword(){
   $id=Auth::user()->id;
   $profileData=user::find($id);
return view('admin.admin_change_password',compact('profileData'));

}
public function calendrier(){
    return view('admin.calendrier');
}

}
