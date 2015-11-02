<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movse', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('imdb', 16)->unique();
            $table->smallInteger('release_year')->unsigned();
            $table->integer('language')->unsigned();
            $table->foreign('language')->references('id')->on('languages');
            $table->integer('quality')->unsigned();
            $table->foreign('quality')->references('id')->on('qualities');
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
        Schema::drop('movse');
    }
}
