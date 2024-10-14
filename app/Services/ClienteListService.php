<?php

namespace App\Services;

use App\Models\Cliente;
use App\Http\Resources\ClienteResource;
use Illuminate\Database\Eloquent\Collection;

class ClienteListService {
    public function getAllClientes()
    {
        $cliente = Cliente::all();
        return ClienteResource::collection($cliente);
    }

    public function getClienteById($id)
    {

        $cliente = Cliente::find($id);

        if ($cliente) {
            return ClienteResource::make($cliente);
        }

        return null;
    }
}
