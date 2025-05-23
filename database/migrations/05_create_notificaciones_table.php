<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id('id_notificacion');
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->string('tipo_notificacion', 100)->nullable();
            $table->text('mensaje')->nullable();
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->enum('estado', ['leído', 'no leído'])->default('no leído');
            $table->unsignedBigInteger('usuario_modifica')->nullable();
            $table->timestamp('fecha_modifica')->nullable()->useCurrentOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notificaciones');
    }
};