<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente\StoreRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use function Pest\Laravel\postJson;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = [
            'nome'     => $request->request->get('nome'),
            'telefone' => $request->request->get('telefone'),
            'email'    => $request->request->get('email'),
        ];

        $cliente = Cliente::create($data);

        return response([
            'data' => [
                'id'    => $cliente->id,
                'nome'  => $cliente->nome,
                'telefone'  => $cliente->telefone,
                'email'  => $cliente->email,
                'created_at' => $cliente->created_at->format('Y-m-d'),
                'updated_at' => $cliente->updated_at->format('Y-m-d'),
            ]
        ], Response::HTTP_CREATED);
    }
}
