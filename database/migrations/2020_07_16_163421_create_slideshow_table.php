<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlideshowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slideshow', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url_img');
            $table->string('titleSmall');
            $table->string('title');
            $table->string('link');
            $table->tinyInteger('position');
            $table->tinyInteger('slideshow_status');
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
        Schema::dropIfExists('slideshow');
    }
}
