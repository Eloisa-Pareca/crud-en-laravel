<?php

use App\Http\Controllers\DireccionController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
 //   return view('agenda.show');

//});
// Ruta principal que redirige a la agenda
Route::get('/index', function () {
    return redirect()->route('agenda.index');
});

// El "Súper Poder": 7 rutas en 1 para tu CRUD
Route::resource('/agenda', DireccionController::class)
    ->except(['show']);// Ruta principal que redirige a la agenda
Route::get('/show', function () {
    return redirect()->route('agenda.show');
});
