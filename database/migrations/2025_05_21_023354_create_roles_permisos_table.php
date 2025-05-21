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
       Schema::create('roles_permisos', function (Blueprint $table) {
    $table->unsignedBigInteger('id_rol');
    $table->unsignedBigInteger('id_permiso');
    $table->primary(['id_rol', 'id_permiso']);
    $table->unsignedBigInteger('usuario_crea')->nullable();
    $table->timestamp('fecha_crea')->useCurrent();
    $table->unsignedBigInteger('usuario_modifica')->nullable();
    $table->timestamp('fecha_modifica')->nullable()->useCurrentOnUpdate();

    $table->foreign('id_rol')->references('id_rol')->on('roles');
    $table->foreign('id_permiso')->references('id_permiso')->on('permisos');
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
        Schema::dropIfExists('roles_permisos');
    }
};
