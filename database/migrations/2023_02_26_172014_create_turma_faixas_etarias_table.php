<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turma_faixas_etarias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('turma_id');
            $table->unsignedInteger('faixa_minima');
            $table->unsignedInteger('faixa_maxima');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turma_faixas_etarias');
    }
};
