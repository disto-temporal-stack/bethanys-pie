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
        Schema::create('pie_ingredient', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pie_id')->unsigned();
            $table->bigInteger('ingredient_id')->unsigned();
            $table->timestamps();

            $table->foreign('pie_id')->references('id')
                                    ->on('pies')
                                    ->onDelete('cascade');

            $table->foreign('ingredient_id')->references('id')
                                    ->on('ingredients')
                                    ->onDelete('cascade');

            $table->unique(['pie_id', 'ingredient_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pie_ingredient');
    }
};
