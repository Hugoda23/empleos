<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('historial_actividades', function (Blueprint $table) {
            $table->id('id_actividad');
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->string('tipo_actividad', 100)->nullable();
            $table->timestamp('fecha_actividad')->useCurrent();
            $table->text('detalles')->nullable();
            $table->unsignedBigInteger('usuario_modifica')->nullable();
            $table->timestamp('fecha_modifica')->nullable()->useCurrentOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_actividades');
    }
};