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
        Schema::create('membros', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('celula_id')->nullable();
            $table->string('nome');
            $table->string('foto')->nullable();
            $table->date('nascimento');
            $table->enum('sexo', ['M', 'F']);
            $table->string('telefone')->nullable();
            $table->string('endereco')->nullable();
            $table->text('observacao')->nullable();
            $table->enum("perfil", [1, 2, 3, 4, 5, 6])->default(5);
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
        Schema::dropIfExists('membros');
    }
};
