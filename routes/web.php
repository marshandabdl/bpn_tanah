<?php

use App\Http\Controllers\SpkController;

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/form', [SpkController::class,'form']);
Route::post('/hitung',[SpkController::class,'hitung']);

Route::get('/fix-data', function() {
    \App\Models\NilaiAlternatif::truncate();
    \App\Models\SubKriteria::truncate();
    \App\Models\Kriteria::truncate();
    \App\Models\Alternatif::truncate();
    \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'AHPSeeder', '--force' => true]);
    return 'Data berhasil direset!';
});
