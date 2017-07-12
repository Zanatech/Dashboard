<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePowerFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('power_factors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('insultest');
            $table->string('textmodetxt');
            $table->string('overalleng');
            $table->string('overallgnd');
            $table->string('overallgar');
            $table->string('overallust');
            $table->string('kv');
            $table->integer('cap');
            $table->integer('pf');
            $table->integer('pf_20');
            $table->integer('corr');
            $table->integer('ma');
            $table->integer('watts');
            $table->string('rating');
            $table->integer('test_id');
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
        Schema::dropIfExists('power_factors');
    }
}
