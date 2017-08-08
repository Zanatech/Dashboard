<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResAislamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_aislamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->double('TestTime');
            $table->double('Corr1');
            $table->double('Corr2');
            $table->double('Corr3');
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
        Schema::dropIfExists('res_aislamientos');
    }
}
