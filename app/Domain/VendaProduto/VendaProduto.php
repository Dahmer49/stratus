<?php

namespace App\Domain\VendaProduto;

use App\Domain\Produto\Produto;
use Illuminate\Database\Eloquent\Model;

class VendaProduto extends Model
{
    public $timestamps = false;

    protected $table = 'venda_produto';

    public function produto()
    {
    	return $this->belongsTo(Produto::class);
    }
}
