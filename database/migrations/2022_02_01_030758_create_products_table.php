<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('nama');
            $table->string('slug');
            $table->string('small_desc')->nullable();
            $table->longText('description')->nullable();
            $table->integer('original_price')->nullable();
            $table->integer('selling_price')->nullable();
            $table->string('qty')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('trending')->nullable();
            $table->tinyInteger('new')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_descrip')->nullable();
            $table->string('meta_keywords')->nullable();
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
        Schema::dropIfExists('products');
    }
}
