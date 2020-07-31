<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_detail_img', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url_img');
            $table->tinyInteger('pdi_status');
            $table->integer('position')->default(0);
            $table->unsignedBigInteger('product_detail_id');
            $table->foreign('product_detail_id')->references('id')->on('product_detail');
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
        Schema::dropIfExists('product_detail_img');
    }
}
