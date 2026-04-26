<?php

use App\Http\Controllers\SpkController;

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/form', [SpkController::class,'form']);
Route::post('/hitung',[SpkController::class,'hitung']);

