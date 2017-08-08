<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrExitacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corr_exitacions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->double('exicte_CorrMa_1');
            $table->double('excite_CorrWatts_1');
            $table->double('excite_CorrMa_2');
            $table->double('excite_CorrWatts_2');
            $table->double('excite_CorrMa_3');
            $table->double('excite_CorrWatts_3');
            $table->integer('test_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corr_exitacions');
    }
}
