<?php

namespace App\Domain\Venda;

use App\Domain\Cliente\Cliente;
use App\Domain\Produto\Produto;
use App\Domain\VendaProduto\VendaProduto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Venda
 *
 * @package Venda
 * @@mixin \Eloquent
 * @property int $id
 * @property int $cliente_id
 * @property float $valor_total
 * @property float $valor_com_desconto
 */


class Venda extends Model
{
    protected $table = 'vendas';

    public $timestamps = false;

    protected $fillable = [
		'cliente_id',
		'valor_total',
		'valor_com_desconto',
    ];

    private $vendaProduto;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->vendaProduto = new Collection;
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function vendaProduto()
    {
    	return $this->hasMany(VendaProduto::class);
    }

    public function adicionarVendaProduto(VendaProduto $vendaProduto): void
    {
        $this->vendaProduto[] = $vendaProduto;
    }

    public function obterVendaProduto(): Collection
    {
        return $this->vendaProduto;
    }
}
