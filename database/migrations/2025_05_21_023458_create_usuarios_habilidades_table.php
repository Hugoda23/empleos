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
        Schema::create('usuarios_habilidades', function (Blueprint $table) {
    $table->unsignedBigInteger('id_usuario');
    $table->unsignedBigInteger('id_habilidad');
    $table->primary(['id_usuario', 'id_habilidad']);
    $table->unsignedBigInteger('usuario_crea')->nullable();
    $table->timestamp('fecha_crea')->useCurrent();
    $table->unsignedBigInteger('usuario_modifica')->nullable();
    $table->timestamp('fecha_modifica')->nullable()->useCurrentOnUpdate();

    $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
    $table->foreign('id_habilidad')->references('id_habilidad')->on('habilidades');
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
        Schema::dropIfExists('usuarios_habilidades');
    }
};
