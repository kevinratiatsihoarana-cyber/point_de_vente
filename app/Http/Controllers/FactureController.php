<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;

class FactureController extends Controller
{
   public function  facture(Request $request){
      $request->validate([
         'cus_id'=>'required'
      ]);
      $cus_id=$request->cus_id;
      $client=client::where('id',$cus_id)->first();
      $contents=\Cart::content();

    return view('factures/facture',compact('client','contents'));
   }
}
