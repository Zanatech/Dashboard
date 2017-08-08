<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFPsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_ps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('testmodetxt');
            $table->double('kv');
            $table->double('cap');
            $table->double('pf');
            $table->double('pf_20');
            $table->double('corr');
            $table->double('ma');
            $table->double('watts');
            $table->double('vdf');
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
        Schema::dropIfExists('f_ps');
    }
}
