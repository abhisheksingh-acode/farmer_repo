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
        g_qty = qty get;
        r_qty = qty accepted;
        q     = quality;
        mode  = payment mode;
        fc_id = fcenter id who accepted order by farmer;
        */
        Schema::create('fc_orders', function (Blueprint $table) {
            $table->id();
            $table->string('sc_number');
            $table->string('g_qty');
            $table->string('r_qty')->nullable()->default("0");
            $table->string('q')->nullable()->default("0");
            $table->string('tax')->nullable()->default("0");
            $table->string('mode');
            $table->string('amount')->nullable()->default(0);
            $table->string('six_r')->nullable();
            $table->string('fc_id');
            $table->string('status')->nullable()->default(0);
            $table->string('additional')->nullable();
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
        Schema::dropIfExists('fc_orders');
    }
};
