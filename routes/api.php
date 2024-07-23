<?php

use App\Http\Controllers\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/cliente', Cliente\StoreController::class)->name('cliente.store');

Route::get('/clientes/listar', Cliente\ListController::class)->name('clientes.list');
