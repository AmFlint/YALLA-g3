<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostSaveView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_save_view', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_save_id')->unsigned()->index();
            $table->foreign('post_save_id')->references('id')->on('post_saves')->onDelete('cascade');
            $table->integer('view_id')->unsigned()->index();
            $table->foreign('view_id')->references('id')->on('views')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_save_view');
    }
}
