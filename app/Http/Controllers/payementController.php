<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payement;
use App\Models\client;


class payementController extends Controller
{
    public function payement(){
        
    $data['payement']=Payement::with('get_client')->get();
    
        return view('/payements/payement')->with($data);
    }
    public function voir_produit($id){
        $data['payement']=Payement::with('get_client')->find($id);
        $client['nom_client']=client::find($data['payement']->client_id);
      
     
       return view('/payements/voir_produit')->with($data)->with($client);
    }

}
