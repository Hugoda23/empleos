<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id('id_reporte');
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->string('tipo_reporte', 100)->nullable();
            $table->text('contenido')->nullable();
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->unsignedBigInteger('usuario_modifica')->nullable();
            $table->timestamp('fecha_modifica')->nullable()->useCurrentOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reportes');
    }
};