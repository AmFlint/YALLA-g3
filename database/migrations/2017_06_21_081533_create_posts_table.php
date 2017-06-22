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
            $table->tinyInteger('published');
            $table->string('locale', 10);
            $table->string('image', 50);
            $table->string('title', 100);
            $table->text('content');
            $table->string('slug', 110);
            $table->string('summary', 150);
            $table->integer('meta_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->integer('views')->default(0);
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
