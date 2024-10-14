<?php

namespace App\Http\Controllers\Cliente;


use App\Http\Controllers\Controller;
use App\Services\ClienteListService;
use Illuminate\Http\Request;

class GetClientByIdController extends Controller
{

    protected $clienteListService;

    public function __construct(ClienteListService $clienteListService)
    {
        $this->clienteListService = $clienteListService;
    }

    public function __invoke(Request $request, $id)
    {
        $cliente = $this->clienteListService->getClienteById($id);

        return $cliente ? response()->json($cliente) : response()->json(['error' => 'Cliente não encontrado'], 404);
    }
}
