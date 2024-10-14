<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Services\ClienteListService;
use Illuminate\Http\Request;

class GetAllClientsController extends Controller
{
    protected $clienteListService;

    public function __construct(ClienteListService $clienteListService)
    {
        $this->clienteListService = $clienteListService;
    }

    public function __invoke(Request $request)
    {
        $cliente = $this->clienteListService->getAllClientes();

        return $cliente ? response()->json($cliente) : response()->json(['error' => 'Não há clientes cadastrados'], 404);
    }
}
