<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente\StoreRequest;
use App\Http\Resources\ClienteResource;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $cliente = Cliente::create($data);

        return ClienteResource::make($cliente);
    }
}
