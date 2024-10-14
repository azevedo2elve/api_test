<?php

use function Pest\Laravel\{assertDatabaseHas, call, postJson};

it('can list all clientes', function () {

    $data_1 = [
        'nome'     => 'Joe Doe',
        'telefone' => '51995141997',
        'email'    => 'joe@doe.com',
    ];

    postJson(route('cliente.store'), $data_1);

    $data_2 = [
        'nome'     => 'Joe Doe 2',
        'telefone' => '51995141990',
        'email'    => 'joe2@doe.com',
    ];

    postJson(route('cliente.store'), $data_2);

    $request = call('GET', route('clientes.listAll'))->assertStatus(200);


    $cliente = \App\Models\Cliente::all();

    $request->assertJson(
        [
            0 => [
                'id'         => $cliente[0]->id,
                'nome'       => $cliente[0]->nome,
                'telefone'   => $cliente[0]->telefone,
                'email'      => $cliente[0]->email,
                'created_at' => $cliente[0]->created_at->format('Y-m-d'),
                'updated_at' => $cliente[0]->updated_at->format('Y-m-d'),
            ],
            1 => [
                'id'         => $cliente[1]->id,
                'nome'       => $cliente[1]->nome,
                'telefone'   => $cliente[1]->telefone,
                'email'      => $cliente[1]->email,
                'created_at' => $cliente[1]->created_at->format('Y-m-d'),
                'updated_at' => $cliente[1]->updated_at->format('Y-m-d'),
            ]
        ]
    );
});

it('can list only a cliente', function (){

    $data_1 = $this->postJson(route('cliente.store'), [
        'nome'     => 'Joe Doe 4',
        'telefone' => '51995141997',
        'email'    => 'joe@doe.com',
    ]);

    $id = $data_1->json('data.id');

    $request = call('GET', route('cliente.listById', ['id' => $id]));

    $cliente = \App\Models\Cliente::find($id);

    $expectedJson =[
            'id' => $cliente->id,
            'nome' => $cliente->nome,
            'telefone' => $cliente->telefone,
            'email' => $cliente->email,
            'created_at' => $cliente->created_at->format('Y-m-d'),
            'updated_at' => $cliente->updated_at->format('Y-m-d'),
        ];

    $request->assertJson($expectedJson);
});
