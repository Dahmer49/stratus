<?php

namespace App;

/**
 * Class Categoria
 *
 * @package Categoria
 * @@mixin \Eloquent
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'nome',
        'descricao',
    ];
}
