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
       Schema::create('vacantes', function (Blueprint $table) {
    $table->id('id_vacante');
    $table->unsignedBigInteger('id_empresa')->nullable();
    $table->string('titulo_puesto', 100);
    $table->text('descripcion_trabajo')->nullable();
    $table->text('requisitos')->nullable();
    $table->decimal('salario', 10, 2)->nullable();
    $table->timestamp('fecha_publicacion')->useCurrent();
    $table->enum('estado', ['activa', 'cerrada'])->default('activa');
    $table->unsignedBigInteger('id_categoria')->nullable();
    $table->unsignedBigInteger('usuario_modifica')->nullable();
    $table->timestamp('fecha_modifica')->nullable()->useCurrentOnUpdate();

    $table->foreign('id_empresa')->references('id_empresa')->on('empresas');
    $table->foreign('id_categoria')->references('id_categoria')->on('categoria_vacantes');
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
        Schema::dropIfExists('vacantes');
    }
};
