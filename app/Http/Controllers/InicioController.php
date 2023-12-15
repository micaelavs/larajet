<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
   /* public function index(){
        return view('vista1');
    }*/

    public function index(Request $peticion){
         $arreglo = ['nombre'=>$peticion->query('nombre', 'DEFAULT')];
         return view('vista1')->with($arreglo);
    }
}
