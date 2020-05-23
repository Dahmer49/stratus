<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = DB::table('categorias')->paginate(15);

        return view('categoria.categoria_index', ['categorias' => $categorias]);
    }

    public function formCadastro()
    {
    	return view('categoria.categoria_cadastro');
    }
}
