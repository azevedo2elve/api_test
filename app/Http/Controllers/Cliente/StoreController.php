<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente\StoreRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
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

        Cliente::create($data);

        return json_encode($data);
    }
}
