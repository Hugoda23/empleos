<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->id('id_ubicacion');
            $table->string('ciudad', 100)->nullable();
            $table->string('estado_provincia', 100)->nullable();
            $table->string('pais', 100)->nullable();
            $table->unsignedBigInteger('usuario_crea')->nullable();
            $table->timestamp('fecha_crea')->useCurrent();
            $table->unsignedBigInteger('usuario_modifica')->nullable();
            $table->timestamp('fecha_modifica')->nullable()->useCurrentOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ubicaciones');
    }
};