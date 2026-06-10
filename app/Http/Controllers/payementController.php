<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;


class payementController extends Controller
{
    public function payement(Request $request){
        $cus_id=$request->cus_id;
       $client=client::where('id',$cus_id)->first();
      $contents=\Cart::content();
    
        return view('/payements/payement',compact('client','contents'));
    }
    public function voir_produit(){
        return view('/payements/voir_produit');
    }
   

}
