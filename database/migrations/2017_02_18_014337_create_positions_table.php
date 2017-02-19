<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('main');
            $table->string('sub');
            $table->timestamps();
        });

        Schema::create('player_position', function(Blueprint $table) {
            $table->unsignedinteger('player_id')->nullable()->index();
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->unsignedinteger('position_id')->nullable()->index();
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
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
        Schema::drop('positions');
    }
}
