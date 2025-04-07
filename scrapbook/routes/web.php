<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScrapController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/scraps/create', [ScrapController::class, 'create'])->name('scraps.create');
Route::post('/scraps', [ScrapController::class, 'store'])->name('scraps.store');
Route::get('/scraps', [ScrapController::class, 'index'])->name('scraps.index');
Route::get('/scraps/{scrap}/edit', [ScrapController::class, 'edit'])->name('scraps.edit');
Route::put('/scraps/{scrap}', [ScrapController::class, 'update'])->name('scraps.update');
Route::delete('/scraps/{scrap}', [ScrapController::class, 'destroy'])->name('scraps.destroy');