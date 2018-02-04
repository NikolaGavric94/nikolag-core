<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nikolag\Core\Utils\Constants;

class CreateNikolagDeductibleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nikolag_deductibles', function (Blueprint $table) {
            $table->morphs('deductible');
            $table->morphs('featurable');
            // $table->string('percentage')->nullable();
            // $table->float('amount')->nullable();
            $table->timestamps();
        });

        // Schema::table('nikolag_deductibles', function(Blueprint $table) {
        //     $table->index(['deductible_id', 'deductible_type']);
        //     $table->index(['featurable_id', 'featurable_type']);
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nikolag_deductibles');
    }
}
