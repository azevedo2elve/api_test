<?php

use App\Http\Controllers\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/cliente', Cliente\StoreController::class)->name('cliente.store');

Route::get('/clientes/listar', Cliente\GetAllClientsController::class)->name('clientes.listAll');

Route::get('/cliente/listar/{id}', Cliente\GetClientByIdController::class)->name('cliente.listById');

Route::patch('/cliente/atualizar/{id}', Cliente\UpdateClientController::class)->name('cliente.update');
