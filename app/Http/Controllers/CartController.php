<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProduitModels;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    public function index(Request $request)
    {

      $request->validate([
       'quantite'=>'required',
      ]
 
  
     );
    $prod['id']=$request['id_produit'];
    $prod['name']=$request['nom_produit'];
    $prod['qty']=$request['quantite'];
    $prod['price']=$request['produit_prix'];
    $add= Cart::add($prod);
  
   if($add){
   $notification=array(
    'message'=>'Vous avez ajouter un produit',
    'alert-type'=>'success'
);


   }
  return redirect()->back()->with($notification);

  }
  public function update(Request $request,$rowId)
  {
    
    $qty=$request->quantite;
    $update=Cart::update($rowId,$qty);
    if($update){
      $notification=array(
       'message'=>'modification effectuée',
       'alert-type'=>'success'
   );
      }
     return redirect()->back()->with($notification);
   
   
  }
  public function remove_cart($rowId){
    $remove=Cart::remove($rowId);
    if($remove){
      $notification=array(
       'message'=>'suppression  effectuée',
       'alert-type'=>'success'
   );
      }else{
        $notification=array(
          'message'=>'suppression effectué',
          'alert-type'=>'success'
      );
      }
     return redirect()->back()->with($notification);

   
   

  }
  public function create_invoice(request $request)
  {
   $contents =Cart::content();
   $cus_id=$request->client_id;
   echo $cus_id;
   

  }
}
