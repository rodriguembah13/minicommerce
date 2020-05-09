<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinePakageProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_pakage_produits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->integer('pakage_product_id')->unsigned();//foreign key
            $table->integer('product_id')->unsigned(); //foreign key
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('pakage_product_id')->references('id')->on('pakage_produits');
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
        Schema::dropIfExists('line_pakage_produits');
    }
}
