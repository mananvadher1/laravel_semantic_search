<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/search', [SearchController::class, 'search']);
Route::get('/search', [SearchController::class, 'index'])->name('search');
