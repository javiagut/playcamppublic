<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

Route::get('/registroQR/{empresa}', function () {
    $empresa = request('empresa');
    return redirect('https://app.playcamp.es/registroQR/'.$empresa);
});
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/politica-privacidad', function(){
    return view('politica-privacidad');
})->name('politica-privacidad');

Route::get('/ubicacion/{ubicacion?}', [AppController::class, 'ubicacion'])->name('ubicacion');
Route::get('/tipo/{tipo}', [AppController::class, 'tipo'])->name('tipo');
Route::get('/camping/{camping}', [AppController::class, 'camping'])->name('camping');
Route::get('/empresa/añadir', [AppController::class, 'añadirEmpresa'])->name('añadirEmpresa');