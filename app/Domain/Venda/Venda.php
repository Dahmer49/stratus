<?php

namespace App\Domain\Venda;

/**
 * Class Venda
 *
 * @package Venda
 * @@mixin \Eloquent
 * @property int $id
 * @property int $cliente_id
 * @property float $valor_total
 * @property float $desconto
 */

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas';

    public $timestamps = false;

    protected $fillable = [
		'nome',
		'cliente_id',
		'valor_total',
		'desconto',
    ];
}
