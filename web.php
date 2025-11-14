<?php

use App\Http\Controllers\BukuController;

Route::get('/', function () {
    return
    redirect()->route('buku.index');
});
Route::resource('buku', BukuController::class);
