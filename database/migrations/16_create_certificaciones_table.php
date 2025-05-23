<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('certificaciones', function (Blueprint $table) {
            $table->id('id_certificacion');
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->string('nombre_certificacion', 100)->nullable();
            $table->string('institucion_otorgante', 100)->nullable();
            $table->date('fecha_obtencion')->nullable();
            $table->date('fecha_expiracion')->nullable();
            $table->unsignedBigInteger('usuario_crea')->nullable();
            $table->timestamp('fecha_crea')->useCurrent();
            $table->unsignedBigInteger('usuario_modifica')->nullable();
            $table->timestamp('fecha_modifica')->nullable()->useCurrentOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificaciones');
    }
};