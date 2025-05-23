<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id('id_empresa');
            $table->string('nombre_empresa', 100);
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('id_ubicacion')->nullable();
            $table->string('sitio_web', 255)->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->unsignedBigInteger('usuario_crea')->nullable();
            $table->timestamp('fecha_crea')->useCurrent();
            $table->unsignedBigInteger('usuario_modifica')->nullable();
            $table->timestamp('fecha_modifica')->nullable()->useCurrentOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empresas');
    }
};