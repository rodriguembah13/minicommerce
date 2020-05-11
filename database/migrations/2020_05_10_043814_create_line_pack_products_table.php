<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinePackProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_pack_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->integer('pack_id')->unsigned();//foreign key
            $table->integer('product_id')->unsigned(); //foreign key
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('pack_id')->references('id')->on('packs');
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
        Schema::dropIfExists('line_pack_products');
    }
}
