<?php

use function Pest\Laravel\{assertDatabaseHas, postJson};

it('can create a cliente', function () {
    $data = [
        'nome'     => 'Joe Doe',
        'telefone' => '51995141997',
        'email'    => 'joe@doe.com',
    ];

    postJson(route('clientes.store'), $data)->assertSuccessful();

    assertDatabaseHas('clientes', $data);
});

it('cliente::required', function () {
    postJson(route('clientes.store'), [])
        ->assertJsonValidationErrors([
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required',
        ]);
});
