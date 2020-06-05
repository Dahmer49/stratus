<?php

declare(strict_types=1);

namespace Tests\Feature\Categoria;

use App\Domain\Categoria\Categoria;
use App\Domain\Categoria\CategoriaRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Response;
use Tests\TestCase;

class CategoriaTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    public function testCadastraCategoria()
    {
        $categoria = $this->criarCategoria();

        $categoriaRepository = new CategoriaRepository();
        $categoriaRepository->salvar($categoria);

	    $this->assertDatabaseHas('categorias', [
	        'nome' => 'Nome teste',
	    ]);
    }

    public function testEditaCategoria()
    {
        $categoria = $this->criarCategoria();
        $categoria->nome = 'Novo nome teste';

        $categoriaRepository = new CategoriaRepository();
        $categoriaRepository->salvar($categoria);

        $this->assertDatabaseHas('categorias', [
            'nome' => 'Novo nome teste',
        ]);
    }

    public function testExcluiCategoria()
    {
        $categoria = $this->criarCategoria();

        $categoriaRepository = new CategoriaRepository();
        $categoriaRepository->salvar($categoria);
        $categoriaRepository->apagar($categoria->id);

        $this->assertDatabaseMissing('categorias', [
            'nome' => 'Nome teste',
        ]);   
    }

    public function testObterCategoria()
    {
        $categoria = $this->criarCategoria();

        $categoriaRepository = new CategoriaRepository();
        $categoriaRepository->salvar($categoria);
        $categoriaRepository->find($categoria->id);

        $this->assertEquals(1, $categoria->id);
    }

    private function criarCategoria(): Categoria
    {
        $categoria = new Categoria();
        $categoria->nome = 'Nome teste';
        $categoria->descricao = 'Descricao teste';

        return $categoria;
    }
}
