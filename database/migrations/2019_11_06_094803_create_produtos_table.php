<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('loja_id');
            $table->foreign('loja_id')
                  ->references('id')->on('loja')
                  ->onDelete('no action');
            $table->string('titulo');
            $table->string('descricao')->nullable();
            $table->unsignedInteger('quantidade')->nullable();
            $table->unsignedInteger('compras_realizadas')->nullable();
            $table->unsignedDecimal('valor_real', 12, 6);
            $table->unsignedInteger('valor_workpoints');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
