<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hearts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->timestamp('started_time');
            $table->timestamp('finish_time')->nullable();
            $table->text('rates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hearts');
    }
}
