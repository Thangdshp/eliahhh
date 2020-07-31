<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_blog_id');
            $table->foreign('category_blog_id')->references('id')->on('category_blog');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user');
            $table->string('title_blog');
            $table->text('content_small');
            $table->text('content');
            $table->string('url_img');
            $table->string('slug');
            $table->tinyInteger('blog_status');
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
        Schema::dropIfExists('blog');
    }
}
