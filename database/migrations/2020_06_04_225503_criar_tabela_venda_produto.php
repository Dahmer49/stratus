<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaVendaProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda_produto', function (BluePrint $table) {
            $table->increments('id');
            $table->integer('venda_id');
            $table->integer('produto_id');
            $table->float('valor');

            $table->foreign('venda_id')->references('id')->on('vendas');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('venda_produto');
    }
}
