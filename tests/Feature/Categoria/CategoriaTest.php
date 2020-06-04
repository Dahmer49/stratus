<?php

declare(strict_types=1);

namespace Tests\Feature\Categoria;

use App\Domain\Categoria\Categoria;
use App\Domain\Categoria\CategoriaRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Response;
use Tests\TestCase;

class LaboratorioTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    public function testCadastraCategoria()
    {
        $categoria = new Categoria();
        $categoria->nome = 'Nome teste';
        $categoria->descricao = 'Descricao teste';

        $categoriaRepository = new CategoriaRepository();
        $categoriaRepository->salvar($categoria);

	    $this->assertDatabaseHas('categorias', [
	        'nome' => 'Nome teste',
	    ]);
    }
}
