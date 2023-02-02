<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('membros', function (Blueprint $table) {
            $table->unique(["celula_id", "nome", "nascimento", "sexo"], "membros_celula_id_nome_nascimento_sexo_unique");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('membros', function (Blueprint $table) {
            $table->dropUnique("membros_celula_id_nome_nascimento_sexo_unique");
        });
    }
};
