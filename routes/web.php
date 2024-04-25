<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;


Route::get('/', [ClientController::class, 'create']);
Route::post('/client/create', [ClientController::class, 'store'])->name('client-create');
