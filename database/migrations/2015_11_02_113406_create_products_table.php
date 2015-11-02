<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(true);
            $table->enum('type', ['MOVIE', 'SERIES', 'SOFTWARE', 'OTHER']);
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 65, 4)->unsigned();
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
        Schema::table('products', function (Blueprint $table) {
            Schema::drop('products');
        });
    }
}
