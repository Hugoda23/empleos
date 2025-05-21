<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('correo_electronico', 100)->unique();
            $table->string('contrasena');
            $table->string('telefono', 20)->nullable();
            $table->timestamp('fecha_registro')->useCurrent();

            // Relación con roles 
            $table->unsignedBigInteger('id_rol')->nullable();
            $table->foreign('id_rol')
                  ->references('id_rol')
                  ->on('roles')
                  ->nullOnDelete();

            // Relación con usuario que modifica (autorreferencia)
            $table->unsignedBigInteger('usuario_modifica')->nullable();
            $table->foreign('usuario_modifica')
                  ->references('id_usuario')
                  ->on('usuarios')
                  ->nullOnDelete();

            $table->timestamp('fecha_modifica')->nullable()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
