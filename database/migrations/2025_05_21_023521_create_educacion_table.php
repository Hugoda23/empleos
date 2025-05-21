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
       Schema::create('educacion', function (Blueprint $table) {
    $table->id('id_educacion');
    $table->unsignedBigInteger('id_usuario');
    $table->string('titulo', 100);
    $table->string('institucion', 100);
    $table->date('fecha_inicio');
    $table->date('fecha_finalizacion')->nullable();
    $table->unsignedBigInteger('usuario_crea')->nullable();
    $table->timestamp('fecha_crea')->useCurrent();
    $table->unsignedBigInteger('usuario_modifica')->nullable();
    $table->timestamp('fecha_modifica')->nullable()->useCurrentOnUpdate();

    $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
    $table->foreign('usuario_crea')->references('id_usuario')->on('usuarios');
    $table->foreign('usuario_modifica')->references('id_usuario')->on('usuarios');
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educacion');
    }
};
