<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
{
    Schema::table('vacantes', function (Blueprint $table) {
        $table->timestamps(); // Agrega created_at y updated_at
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacantes', function (Blueprint $table) {
            //
        });
    }
};
