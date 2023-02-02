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
        Schema::create('celulas', function (Blueprint $table) {
            $table->integer('id');
            $table->unsignedInteger('rede_id')->nullable();
            $table->unsignedBigInteger('lider_id')->nullable();
            $table->string('nome');
            $table->string('endereco')->nullable();
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
        Schema::dropIfExists('celulas');
    }
};
