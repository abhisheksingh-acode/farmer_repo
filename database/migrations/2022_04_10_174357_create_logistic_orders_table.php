<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        source = fcenter id recieved from
        destiny = warehouse id deliverd to
        */
        Schema::create('logistic_orders', function (Blueprint $table) {
            $table->id();
            $table->string('logistic_id');
            $table->string('nine_r');
            $table->string('source');
            $table->string('destiny');
            $table->string('gate_pass');
            $table->string('additional')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('logistic_orders');
    }
};
