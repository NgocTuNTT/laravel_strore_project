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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
             $table->string('name');
             $table->string('slug');
            $table->mediumText('small_description')->nullable();
            $table->longText('description')->nullValue();
            $table->integer('original_price');
            $table->integer('selling_price');
            $table->integer('quantity');
            $table->string('meta_title')->nullValue();
            $table->string('meta_keyword')->nullValue();
            $table->mediumText('meta_description')->nullValue();
            $table->tinyInteger('discount')->nullValue()->default('0')->comment('0=visible,1=hidden');
            $table->tinyInteger('trending')->nullValue()->default('0')->comment('0=visible,1=hidden');
            $table->tinyInteger('status')->default('0')->comment('0=visible,1=hidden');

            $table->string('brand')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
};
