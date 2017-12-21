<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('card_id')->unsigned();
            $table->string('name');
            $table->integer('hole_1')->unsigned()->nullable();
            $table->integer('hole_2')->unsigned()->nullable();
            $table->integer('hole_3')->unsigned()->nullable();
            $table->integer('hole_4')->unsigned()->nullable();
            $table->integer('hole_5')->unsigned()->nullable();
            $table->integer('hole_6')->unsigned()->nullable();
            $table->integer('hole_7')->unsigned()->nullable();
            $table->integer('hole_8')->unsigned()->nullable();
            $table->integer('hole_9')->unsigned()->nullable();
            $table->integer('hole_10')->unsigned()->nullable();
            $table->integer('hole_11')->unsigned()->nullable();
            $table->integer('hole_12')->unsigned()->nullable();
            $table->integer('hole_13')->unsigned()->nullable();
            $table->integer('hole_14')->unsigned()->nullable();
            $table->integer('hole_15')->unsigned()->nullable();
            $table->integer('hole_16')->unsigned()->nullable();
            $table->integer('hole_17')->unsigned()->nullable();
            $table->integer('hole_18')->unsigned()->nullable();

            $table->timestamps();

            $table->foreign('card_id')->references('id')->on('cards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
