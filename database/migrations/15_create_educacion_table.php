<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('educacion', function (Blueprint $table) {
            $table->id('id_educacion');
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->string('titulo', 100)->nullable();
            $table->string('institucion', 100)->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_finalizacion')->nullable();
            $table->unsignedBigInteger('usuario_crea')->nullable();
            $table->timestamp('fecha_crea')->useCurrent();
            $table->unsignedBigInteger('usuario_modifica')->nullable();
            $table->timestamp('fecha_modifica')->nullable()->useCurrentOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('educacion');
    }
};