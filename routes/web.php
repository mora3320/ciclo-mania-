<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReparacionController;

Route::get('/', function () {
    return redirect()->route('reparaciones.index');
});

Route::resource('reparaciones', ReparacionController::class);
