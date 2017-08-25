<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMTOsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_t_os', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('test_num');
            $table->string('tap');
            $table->integer('tap_volt')->nullable();
            $table->double('current');
            $table->double('resw1');
            $table->double('resw2');
            $table->double('resw3');
            $table->double('sf1');
            $table->double('variance');
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
        Schema::dropIfExists('m_t_os');
    }
}
