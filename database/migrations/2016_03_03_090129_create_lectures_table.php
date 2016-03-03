<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('link');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });


        Schema::create('lecture_part', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('lecture_id')->unsigned();
            $table->text('text');
            $table->text('question');
            $table->timestamps();

            $table->foreign('lecture_id')->references('id')->on('lectures');
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('lecture_part_id')->unsigned();
            $table->string('answer');
            $table->boolean('correct')->default(0);
            $table->timestamps();

            $table->foreign('lecture_part_id')->references('id')->on('lecture_part');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lectures');
    }
}
