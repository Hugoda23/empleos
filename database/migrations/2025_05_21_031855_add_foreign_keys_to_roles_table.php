<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->foreign('usuario_crea')->references('id_usuario')->on('usuarios')->nullOnDelete();
            $table->foreign('usuario_modifica')->references('id_usuario')->on('usuarios')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropForeign(['usuario_crea']);
            $table->dropForeign(['usuario_modifica']);
        });
    }
};
