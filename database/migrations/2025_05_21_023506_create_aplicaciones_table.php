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
        Schema::create('aplicaciones', function (Blueprint $table) {
    $table->id('id_aplicacion');
    $table->unsignedBigInteger('id_vacante');
    $table->unsignedBigInteger('id_usuario');
    $table->timestamp('fecha_aplicacion')->useCurrent();
    $table->enum('estado_aplicacion', ['en revisión', 'aceptada', 'rechazada'])->default('en revisión');
    $table->unsignedBigInteger('usuario_modifica')->nullable();
    $table->timestamp('fecha_modifica')->nullable()->useCurrentOnUpdate();

    $table->foreign('id_vacante')->references('id_vacante')->on('vacantes');
    $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
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
        Schema::dropIfExists('aplicaciones');
    }
};
