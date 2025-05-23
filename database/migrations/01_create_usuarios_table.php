<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('correo_electronico', 100)->unique();
            $table->string('contrasena');
            $table->string('telefono', 20)->nullable();
            $table->timestamp('fecha_registro')->useCurrent();

            $table->unsignedBigInteger('id_rol')->nullable();
            $table->unsignedBigInteger('usuario_modifica')->nullable();

            $table->timestamp('fecha_modifica')->nullable()->useCurrentOnUpdate();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
