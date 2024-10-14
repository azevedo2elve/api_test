<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Services\ClienteListService;
use Illuminate\Http\Request;

class UpdateClientController extends Controller
{
    protected $clienteListService;

    public function __construct(ClienteListService $clienteListService)
    {
        $this->clienteListService = $clienteListService;
    }
    public function __invoke(Request $request, $id)
    {
        $data = $request->validate([
            'nome' => 'string|max:255',
            'telefone' => 'string|max:255',
            'email' => 'email|max:255'
        ]);

        $cliente = $this->clienteListService->getClienteById($id);

        $cliente->update($data);

        return response()->json([
            'message' => 'Cliente atualizado com sucesso!',
            'cliente' => $cliente
        ]);
    }
}
