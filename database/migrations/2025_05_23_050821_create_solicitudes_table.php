<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id(); // id de la solicitud
            $table->unsignedBigInteger('id_usuario'); // postulante
            $table->unsignedBigInteger('id_vacante'); // puesto solicitado
            $table->text('mensaje')->nullable(); // mensaje opcional del postulante
            $table->string('cv_url')->nullable(); // URL del CV si lo sube

            $table->timestamps(); // created_at (fecha postulación), updated_at

            // Claves foráneas
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_vacante')->references('id_vacante')->on('vacantes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
}
