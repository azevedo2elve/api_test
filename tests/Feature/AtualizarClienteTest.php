<?php

use function Pest\Laravel\{patchJson};
use App\Models\Cliente;

it('can update client ', function (){
    $cliente = Cliente::factory()->create();

    $data = [
        'nome' => 'Gabriel Atualizado',
        'telefone' => '51995551997',
        'email' => 'azevedo@email.com'
    ];

    $response = $this->patchJson(route('cliente.update', $cliente->id), $data);

    $cliente_update = Cliente::find($cliente->id);

    $response->assertStatus(200)
        ->assertJson([
            'message' => 'Cliente atualizado com sucesso!',
            'cliente' => [
                'id' => $cliente->id,
                'nome' => $data['nome'],
                'telefone' => $data['telefone'],
                'email' => $data['email'],
                'created_at' => $cliente_update->created_at->format('Y-m-d'),
                'updated_at' => $cliente_update->updated_at->format('Y-m-d'),
            ]
        ]);
});
