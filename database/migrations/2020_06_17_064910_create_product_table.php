<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');   
            $table->string('slug');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category');  
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brand');
            $table->unsignedBigInteger('feature_id')->nullable();
            $table->foreign('feature_id')->references('id')->on('feature');
            $table->text('description');
            $table->tinyInteger('active_new');
            $table->tinyInteger('product_status');
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
        Schema::dropIfExists('product');
    }
}
