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
    Schema::table('empresas', function (Blueprint $table) {
        $table->boolean('estado')->default(1)->after('sitio_web');
    });
}

public function down()
{
    Schema::table('empresas', function (Blueprint $table) {
        $table->dropColumn('estado');
    });
}

};
