<?php

use function Pest\Laravel\{assertDatabaseHas, postJson};

it('can create a cliente', function () {
    $data = [
        'nome'     => 'Joe Doe',
        'telefone' => '51995141997',
        'email'    => 'joe@doe.com',
    ];

    postJson(route('cliente.store'), $data)->assertSuccessful();

    assertDatabaseHas('clientes', $data);
});

describe('validation rules', function () {
    test('cliente:required', function () {
        postJson(route('cliente.store'), [])
         ->assertJsonValidationErrors([
             'nome'     => 'required',
             'telefone' => 'required',
             'email'    => 'required',
         ]);
    });

    test('email:email', function () {
        postJson(route('cliente.store'), [
            'email' => 'joedoe.com',
        ])
          ->assertJsonValidationErrors([
              'email' => 'The email field must be a valid email address.',
          ]);
    });

    test('email:unique:cliente', function () {
        \App\Models\Cliente::factory()->create([
            'nome'     => 'Joe Doe',
            'email'    => 'joe@doe.com',
            'telefone' => '51995141997',
        ]);

        postJson(route('cliente.store'), [
            'nome'     => 'Joe Doe',
            'email'    => 'joe@doe.com',
            'telefone' => '51995141997',
        ])
          ->assertJsonValidationErrors([
              'email' => 'already been taken',
          ]);
    });

    test('telefone:min:10', function () {
        postJson(route('cliente.store'), [
            'telefone' => '519951',
        ])
          ->assertJsonValidationErrors([
              'telefone' => 'The telefone field must be at least 10 characters.',
          ]);
    });
});

it('return of the creating cliente', function () {
    $data = [
        'nome'     => 'Joe Doe',
        'telefone' => '51995141997',
        'email'    => 'joe@doe.com',
    ];

    $request = postJson(route('cliente.store'), $data)
        ->assertCreated();

    $cliente = \App\Models\Cliente::latest()->first();

    // dd($request->json());

    $request->assertJson(
        [
            'data' => [
                'id'         => $cliente->id,
                'nome'       => $cliente->nome,
                'telefone'   => $cliente->telefone,
                'email'      => $cliente->email,
                'created_at' => $cliente->created_at->format('Y-m-d'),
                'updated_at' => $cliente->updated_at->format('Y-m-d'),
            ],
        ]
    );
});
