<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nikolag\Core\Utils\Constants;

class CreateNikolagProductOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nikolag_product_order', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->integer('quantity')->unsigned();
        });

        Schema::table('nikolag_product_order', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->unique(['product_id', 'order_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nikolag_product_order');
    }
}
