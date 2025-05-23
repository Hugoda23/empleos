<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('aplicaciones', function (Blueprint $table) {
            $table->id('id_aplicacion');
            $table->unsignedBigInteger('id_vacante')->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->timestamp('fecha_aplicacion')->useCurrent();
            $table->enum('estado_aplicacion', ['en revisión', 'aceptada', 'rechazada'])->default('en revisión');
            $table->unsignedBigInteger('usuario_modifica')->nullable();
            $table->timestamp('fecha_modifica')->nullable()->useCurrentOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aplicaciones');
    }
};