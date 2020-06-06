<?php

declare(strict_types=1);

namespace Tests\Feature\Produto;

use App\Domain\Categoria\Categoria;
use App\Domain\Categoria\CategoriaRepository;
use App\Domain\Produto\Produto;
use App\Domain\Produto\ProdutoRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Response;
use Tests\TestCase;

class ProdutoTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    public function testCadastraProduto()
    {
        $produto = $this->criarProduto();

        $produtoRepository = new ProdutoRepository();
        $produtoRepository->salvar($produto);

	    $this->assertDatabaseHas('produtos', [
	        'nome' => 'Nome teste',
	    ]);
    }

    public function testEditaProduto()
    {
        $produto = $this->criarProduto();
        $produto->nome = 'Novo nome teste';

        $produtoRepository = new ProdutoRepository();
        $produtoRepository->salvar($produto);

        $this->assertDatabaseHas('produtos', [
            'nome' => 'Novo nome teste',
        ]);
    }

    public function testExcluiProduto()
    {
        $produto = $this->criarProduto();

        $produtoRepository = new ProdutoRepository();
        $produtoRepository->salvar($produto);
        $produtoRepository->apagar($produto->id);

        $this->assertDatabaseMissing('produtos', [
            'nome' => 'Nome teste',
        ]);   
    }

    public function testObterProduto()
    {
        $produto = $this->criarProduto();

        $produtoRepository = new ProdutoRepository();
        $produtoRepository->salvar($produto);
        $produtoRepository->find($produto->id);

        $this->assertEquals(1, $produto->id);
    }

    private function criarProduto(): Produto
    {
    	$categoria = $this->criarCategoria();

        $produto = new Produto();
        $produto->nome = 'Nome teste';
        $produto->categoria_id = $categoria->id;
        $produto->valor = 500;

        return $produto;
    }

    private function criarCategoria(): Categoria
    {
        $categoria = new Categoria();
        $categoria->nome = 'Nome teste';
        $categoria->descricao = 'Descricao teste';

        $categoriaRepository = new CategoriaRepository();
        $categoriaRepository->salvar($categoria);

        return $categoria;
    }
}
