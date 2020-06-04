<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/listagem_categorias', CategoriaController::class . '@index')->name('listagem_categorias');
Route::get('/cadastro_categorias', CategoriaController::class . '@formCadastro');
Route::post('/cadastrar_categoria', CategoriaController::class . '@cadastrar');
Route::get('/edicao_categorias/{id}', CategoriaController::class . '@formEdicao');
Route::post('/editar_categoria/{id}', CategoriaController::class . '@editar');
Route::get('/apagar_categoria/{id}', CategoriaController::class . '@apagar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

