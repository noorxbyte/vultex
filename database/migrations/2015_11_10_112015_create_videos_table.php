<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->primary('product_id');
            $table->string('imdb', 16)->nullable();
            $table->string('release_year');
            $table->string('genre')->nullable();
            $table->integer('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('languages');
            $table->integer('quality_id')->unsigned();
            $table->foreign('quality_id')->references('id')->on('qualities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('videos');
    }
}
