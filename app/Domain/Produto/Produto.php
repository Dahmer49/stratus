<?php

namespace App\Domain\Produto;

use App\Domain\Categoria\Categoria;

/**
 * Class Produto
 *
 * @package Produto
 * @@mixin \Eloquent
 * @property int $id
 * @property string $nome
 * @property int $categoria_id
 * @property float $valor
 */

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    public $timestamps = false;

    public $quantidade;

    protected $fillable = [
        'nome',
        'categoria_id',
        'valor',
    ];

    public function categoria()
    {
    	return $this->belongsTo(Categoria::class);
    }
}
