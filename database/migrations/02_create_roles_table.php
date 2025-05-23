<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id('id_rol');
            $table->string('nombre_rol', 50);
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('usuario_crea')->nullable();
            $table->unsignedBigInteger('usuario_modifica')->nullable();
            $table->timestamp('fecha_crea')->useCurrent();
            $table->timestamp('fecha_modifica')->nullable()->useCurrentOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
};