<?php

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\postJson;

it('can create a cliente', function () {
    $data = postJson(route('clientes.store'), [
        'nome' => 'Joe Doe',
        'telefone' => '55555555',
        'email' => 'joe@doe.com',
    ])->assertSuccessful();

    assertDatabaseHas('clientes', [
        'nome' => 'Joe Doe',
        'telefone' => '55555555',
        'email' => 'joe@doe.com',
    ]);
});
