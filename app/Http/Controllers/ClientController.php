<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;
class ClientController extends Controller
{
   public function gerer_client()
   {
    $data['clients']=client::all();
    return view('clients.gerer_client')->with($data);
   }
   public function ajouter_client(Request $request){
    $submit=$request["submit"];
     if($submit=="submit"){
      $request->validate([
        "nom" => "required",
        "prenom"=>"required",
        "phone" =>"required",
        "ville" =>"required",
      ]);
   
      $client=new client;
      $client->nom=$request['nom'];
      $client->prenom=$request['prenom'];
      $client->phone=$request['phone'];
      $client->ville=$request['ville'];
      if($request->file('photo')){
        $file=$request->file('photo');
        @unlink(public_path('upload/client_images/'.$client->photo));
        $filename=$file->getclientOriginalName();
        $file->move(public_path('upload/client_images'),$filename);
        $client['photo']=$filename;
    
    }
       
    $client->save();
      $notification=array(
        'message'=>'Vous avez ajouter un client',
        'alert-type'=>'success'
    );
      return redirect()->route('gerer.client')->with($notification);
     }
  
   return view('clients/ajouter_client');

   }
   public function delete_client($id){
     $client=client::find($id);
     if($client==""){
      return redirect('/clients/gerer_client');
  
     }else{
      $client->delete();
      $notification=array(
        'message'=>'Vous avez supprimer un client',
        'alert-type'=>'success'
    );
      return redirect()->route('gerer.client')->with($notification);
     }
   }
   public function modifier_client($id,Request $request){
    $client=client::find($id);
    if($client==""){
     return redirect('/clients/gerer_client');
  }
  $submit=$request["submit"];
  if($submit=="submit"){
   $request->validate([
     "nom" => "required",
     "prenom"=>"required" ,
     "phone" =>"required",
     "ville" =>"required",
   ]);

   $client->nom=$request['nom'];
   $client->prenom=$request['prenom'];
   $client->phone=$request['phone'];
   $client->ville=$request['ville'];
   if($request->file('photo')){
     $file=$request->file('photo');
     @unlink(public_path('upload/client_images/'.$client->photo));
     $filename=$file->getclientOriginalName();
     $file->move(public_path('upload/client_images'),$filename);
     $client['photo']=$filename;
 
 }
    
 $client->save();

   $notification=array(
     'message'=>'Vous avez modifier un client',
     'alert-type'=>'success'
 );
   return redirect()->route('gerer.client')->with($notification);
  }
  
  
  $data['client_details']=$client;

  return view('clients/modifier_client')->with($data);
   
}

}