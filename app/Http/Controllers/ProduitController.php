<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProduitModels;
use App\Models\CategorieModels;
class ProduitController extends Controller
{
   public function gerer_produit()
   {
    $data['produit']=ProduitModels::with('get_categorie')->get();
    return view('produits.gerer_produit')->with($data);
   }
   public function ajouter_produit(Request $request){
    $submit=$request["submit"];
     if($submit=="submit"){
      $request->validate([
        "nom_produit" => "required",
        "marque_produit"=>"required" ,
        "produit_prix" =>"required",
        "categorie_id" =>"required",
      ]);
   
      $produit=new ProduitModels;
      $produit->nom_produit=$request['nom_produit'];
      $produit->marque_produit=$request['marque_produit'];
      $produit->produit_prix=$request['produit_prix'];
      $produit->categorie_id=$request['categorie_id'];
      $request->file('image_produit');
      if($request->file('image_produit')){
        $file=$request->file('image_produit');
        @unlink(public_path('upload/produit_images/'.$produit->image_produit));
        $filename=$file->getclientOriginalName();
        $file->move(public_path('upload/produit_images'),$filename);
        $produit['image_produit']=$filename;
    
    }
       
      $produit->save();
      $notification=array(
        'message'=>'Vous avez ajouter un produit',
        'alert-type'=>'success'
    );
      return redirect()->route('gerer.produit')->with($notification);
     }
     $data['categorie_liste']= CategorieModels::all();
  
   return view('produits/ajouter_produit')->with($data);

   }
   public function delete_produit($id){
     $produit=ProduitModels::find($id);
     if($produit==""){
      return redirect('/produits/gerer_produit');
  
     }else{
      $produit->delete();
      $notification=array(
        'message'=>'Vous avez supprimer un produit',
        'alert-type'=>'success'
    );
      return redirect()->route('gerer.produit')->with($notification);
     }
   }
   public function modifier_produit($id,Request $request){
    $produit=ProduitModels::find($id);
    if($produit==""){
     return redirect('/produits/gerer_produit');
  }
  $submit=$request["submit"];
  if($submit=="submit"){
   $request->validate([
    "nom_produit" => "required",
    "marque_produit"=>"required" ,
    "produit_prix" =>"required",
    "categorie_id" =>"required",
   ]);

   $produit->nom_produit=$request['nom_produit'];
   $produit->marque_produit=$request['marque_produit'];
   $produit->produit_prix=$request['produit_prix'];
   $produit->categorie_id=$request['categorie_id'];
   if($request->file('image_produit')){
     $file=$request->file('image_produit');
     @unlink(public_path('upload/produit_images/'.$produit->image_produit));
     $filename=$file->getclientOriginalName();
     $file->move(public_path('upload/produit_images'),$filename);
     $produit['image_produit']=$filename;
 
 }
    
 $produit->save();

   $notification=array(
     'message'=>'Vous avez modifier un produit',
     'alert-type'=>'success'
 );
   return redirect()->route('gerer.produit')->with($notification);
  }
  
  
  $data['produit_details']=$produit;
  $categorie_data['categorie_liste']= CategorieModels::all();
  return view('produits/modifier_produit')->with($data)->with($categorie_data);
   
}


}
