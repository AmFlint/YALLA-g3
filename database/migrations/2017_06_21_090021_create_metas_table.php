<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('metas', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('type', 30);
//            $table->string('card', 100);
//            $table->string('locale')->index();
//            $table->string('title', 50);
//            $table->string('url', 150);
//            $table->string('meta_description', 100);
//            $table->tinyInteger('meta_robots');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metas');
    }
}
