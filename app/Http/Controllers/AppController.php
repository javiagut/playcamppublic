<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

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
    function camping(){
        $nombre = str_replace('-', ' ', request('camping'));
        $empresa = Empresa::where('nombre', $nombre)->first();
        if(!$empresa){
            return redirect('/');
        }
        return view('camping', [
            'nombre' => $nombre,
            'descripcion' => $empresa ? $empresa->descripcion : ''
        ]);
    }
    function blog(){
        return view('blog');
    }
}
