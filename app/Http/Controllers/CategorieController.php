<?php

namespace App\Http\Controllers;
use App\Models\CategorieModels;

use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function ajouter_categorie(Request $request){
        $submit=$request["submit"];
         if($submit=="submit"){
          $request->validate([
            "nom_categorie" => "required",
          ]);
       
          $categorie=new CategorieModels;
          $categorie->nom_categorie=$request['nom_categorie'];
        $categorie->save();
          $notification=array(
            'message'=>'Vous avez ajouter un categorie',
            'alert-type'=>'success'
        );
          return redirect()->route('gerer.categorie')->with($notification);
         }
      
       return view('categories/ajouter_categorie');
    
       }
       public function gerer_categorie()
   {
    $data['categorie']=CategorieModels::all();
    return view('categories.gerer_categorie')->with($data);
   }
   public function delete_categorie($id){
    $categorie=CategorieModels::find($id);
    if($categorie==""){
     return redirect('/categories/gerer_categorie');
 
    }else{
     $categorie->delete();
     $notification=array(
       'message'=>'Vous avez supprimer un categorie',
       'alert-type'=>'success'
   );
     return redirect()->route('gerer.categorie')->with($notification);
    }
  }
  public function modifier_categorie($id,Request $request){
    $categorie=CategorieModels::find($id);
    if($categorie==""){
     return redirect('/categories/gerer_categorie');
  }
  $submit=$request["submit"];
  if($submit=="submit"){
   $request->validate([
     "nom_categorie" => "required",
 
   ]);

   $categorie->nom_categorie=$request['nom_categorie'];

    
 $categorie->save();

   $notification=array(
     'message'=>'Vous avez modifier un categorie',
     'alert-type'=>'success'
 );
   return redirect()->route('gerer.categorie')->with($notification);
  }
  
  
  $data['categorie_details']=$categorie;

  return view('categories/modifier_categorie')->with($data);
   
}
}
