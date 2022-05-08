<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_producto', function (Blueprint $table) {
            $table->bigInteger('cart_id')->unsigned();
            $table->bigInteger('producto_id')->unsigned();
            $table->bigInteger('quantity')->unsigned();

            $table->foreign('cart_id')->references('id')->on('carts');
            $table->foreign('producto_id')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_producto');
    }
}
