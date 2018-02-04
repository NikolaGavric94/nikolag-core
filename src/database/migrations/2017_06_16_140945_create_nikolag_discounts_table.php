<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nikolag\Core\Utils\Constants;

class CreateNikolagDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nikolag_discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('percentage')->nullable();
            $table->integer('amount')->nullable();
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
        Schema::dropIfExists('nikolag_discounts');
    }
}
