<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('published')->default(0);
            $table->string('locale', 10);
            $table->string('image', 50);
            $table->string('alt', 100);
            $table->string('title', 100);
            $table->text('content');
            $table->string('slug', 150);
            $table->string('summary', 300);
            $table->integer('media_id')->unsigned()->index()->nullable();
            $table->string('card', 100);
            $table->string('meta_robots', 30)->nullable();
            $table->string('meta_description', 200);
            $table->integer('category_id')->unsigned()->index();
            $table->integer('view')->default(0);
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
        Schema::dropIfExists('posts');
    }
}
