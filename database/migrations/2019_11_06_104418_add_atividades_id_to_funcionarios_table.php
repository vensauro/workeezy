<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAtividadesIdToFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->unsignedBitInteger('atividades_id')->nullable();
            $table->foreign('atividades_id')
                  ->references('id')->on('atividades')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->dropForeign('funcionarios_atividades_id_foreign');
            $table->dropColumn('atividades_id');
        });
    }
}
