<?php

namespace App\Domain\Cliente;

/**
 * Class Cliente
 *
 * @package Cliente
 * @@mixin \Eloquent
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string $telefone
 * @property string $email
 * @property Carbon $data_nascimento
 */

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    public $timestamps = false;

    protected $fillable = [
		'nome',
		'cpf',
		'telefone',
		'email',
		'data_nascimento',
    ];
}
