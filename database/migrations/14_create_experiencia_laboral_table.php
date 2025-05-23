<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('experiencia_laboral', function (Blueprint $table) {
            $table->id('id_experiencia');
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->string('puesto', 100)->nullable();
            $table->string('empresa', 100)->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->text('descripcion_funciones')->nullable();
            $table->unsignedBigInteger('usuario_crea')->nullable();
            $table->timestamp('fecha_crea')->useCurrent();
            $table->unsignedBigInteger('usuario_modifica')->nullable();
            $table->timestamp('fecha_modifica')->nullable()->useCurrentOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('experiencia_laboral');
    }
};