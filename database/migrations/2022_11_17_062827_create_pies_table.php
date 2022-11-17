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
        Schema::create('pies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('allergy_information')->nullable();
            $table->decimal('price');
            $table->boolean('in_stock')->default(true);
            $table->bigInteger('provider_id')->unsigned()->nullable();
            $table->bigInteger('image_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->timestamps();

            $table->foreign('provider_id')->references('id')
                                    ->on('providers')
                                    ->onDelete('cascade');
    
            $table->foreign('image_id')->references('id')
                                    ->on('images')
                                    ->onDelete('cascade');

            $table->foreign('category_id')->references('id')
                                    ->on('categories')
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
        Schema::dropIfExists('pies');
    }
};
