<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('shortname');
            $table->unsignedinteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedinteger('captain_id')->nullable();
            $table->foreign('captain_id')->references('id')->on('players')->onDelete('cascade');
            $table->unsignedinteger('won');
            $table->unsignedinteger('loss');
            $table->unsignedinteger('draw');
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
        Schema::drop('teams');
    }
}
