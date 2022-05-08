<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_producto', function (Blueprint $table) {

            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('producto_id')->unsigned();
            $table->bigInteger('quantity')->unsigned();

            $table->foreign('order_id')->references('id')->on('orders');
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
        Schema::dropIfExists('order_producto');
    }
}
