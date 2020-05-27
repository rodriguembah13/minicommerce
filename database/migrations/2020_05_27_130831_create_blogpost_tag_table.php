<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogpostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogpost_blogtag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blogpost_id');
            $table->integer('blogtag_id');
            /*$table->foreign('blogpost_id')->references('id')->on('blogpost');
            $table->foreign('blogtag_id')->references('id')->on('blogtag');*/
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
        Schema::dropIfExists('blogpost_tag');
    }
}
