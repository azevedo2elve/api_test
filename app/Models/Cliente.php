<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 */
class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'telefone',
        'email'
    ];
}
