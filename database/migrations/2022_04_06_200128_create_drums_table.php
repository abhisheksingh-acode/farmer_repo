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
        Schema::create('drums', function (Blueprint $table) {
            $table->id();
            $table->string('fc_order_id');
            $table->string('qty');
            $table->string('fillable')->nullable()->default(1); // true = can fill / false = can't fill
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
        Schema::dropIfExists('drums');
    }
};
