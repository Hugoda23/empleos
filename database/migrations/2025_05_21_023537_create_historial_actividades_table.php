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
       Schema::create('historial_actividades', function (Blueprint $table) {
    $table->id('id_actividad');
    $table->unsignedBigInteger('id_usuario');
    $table->string('tipo_actividad', 100);
    $table->timestamp('fecha_actividad')->useCurrent();
    $table->text('detalles')->nullable();
    $table->unsignedBigInteger('usuario_modifica')->nullable();
    $table->timestamp('fecha_modifica')->nullable()->useCurrentOnUpdate();

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
        Schema::dropIfExists('historial_actividades');
    }
};
