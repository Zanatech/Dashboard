<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');          
            $table->date('target_date');
            $table->timestamps();
            $table->date('due_date')->nullable();
            $table->boolean('job_complete')->default(false);
            $table->boolean('invoice_sent')->default(false);
            $table->integer('user_id');
            $table->integer('asset_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
