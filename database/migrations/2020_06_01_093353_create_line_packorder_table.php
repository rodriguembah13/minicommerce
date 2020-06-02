<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinePackorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_packorders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity_restant');
            $table->integer('quantity_use');
            $table->integer('product_id')->unsigned(); //foreign key
            $table->integer('packorder_id')->unsigned(); //foreign key
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('packorder_id')->references('id')->on('packorders');
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
        Schema::dropIfExists('line_packorders');
    }
}
