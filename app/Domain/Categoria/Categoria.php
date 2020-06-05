<?php

namespace App\Domain\Categoria;

/**
 * Class Categoria
 *
 * @package Categoria
 * @@mixin \Eloquent
 * @property int $id
 * @property string $nome
 * @property string $descricao
 */

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'descricao',
    ];
}
