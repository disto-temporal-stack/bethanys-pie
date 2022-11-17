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
        //
        Schema::table('users', function (Blueprint $table) {
          
        //Agregar la columna que contendrá el dato foráneo
        $table->bigInteger('domiciliary_id')->unsigned()->unique();
        //Hacer efectivo la relación
        $table->foreign('domiciliary_id')->references('id')
                                ->on('domiciliaries')
                                ->onDelete('cascade');
    });

}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
