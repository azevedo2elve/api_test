<?php

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\postJson;

it('can create a cliente', function () {
    $data = [
        'nome' => 'Joe Doe',
        'telefone' => '55555555',
        'email' => 'joe@doe.com',
    ];

    postJson(route('clientes.store'), $data)->assertSuccessful();

    assertDatabaseHas('clientes', $data);
});
