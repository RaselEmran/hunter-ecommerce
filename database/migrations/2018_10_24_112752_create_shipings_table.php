<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shiping_last_name');
            $table->string('shiping_first_name');
            $table->string('shiping_email');
            $table->string('shiping_address');
            $table->string('shiping_mobile');
            $table->string('shiping_city');
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
        Schema::dropIfExists('shipings');
    }
}
