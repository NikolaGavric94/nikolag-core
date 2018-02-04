<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nikolag\Core\Utils\Constants;

class CreateNikolagProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nikolag_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('variation_name', 100);
            $table->string('note', 50);
            $table->float('price');
            $table->string('reference_id', 25)->nullable();
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
        Schema::dropIfExists('nikolag_products');
    }
}