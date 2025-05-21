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
       Schema::create('certificaciones', function (Blueprint $table) {
    $table->id('id_certificacion');
    $table->unsignedBigInteger('id_usuario');
    $table->string('nombre_certificacion', 100);
    $table->string('institucion_otorgante', 100);
    $table->date('fecha_obtencion');
    $table->date('fecha_expiracion')->nullable();
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
        Schema::dropIfExists('certificaciones');
    }
};
