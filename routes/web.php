<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::get('/', [ClientController::class,'index'])->name('home');
Route::get('/create', [ClientController::class, 'create'])->name('form-client');
Route::post('/client/create', [ClientController::class, 'store'])->name('client-create');


