<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    function ubicacion(){
        return view('ubicacion');
    }
    function tipo(){
        return view('tipo', [
            'tipo' => request('tipo')
        ]);
    }
    function añadirEmpresa(){
        return view('añadirEmpresa');
    }
}
