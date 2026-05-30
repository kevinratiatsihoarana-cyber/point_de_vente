<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListeController extends Controller
{
    public function liste(){
        return view('liste/liste');
    }
}
