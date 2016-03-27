<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecutreTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link');
            $table->string('title');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('lecture_parts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lecture_id')->unsigned()->index();
            $table->string('title');
            $table->text('text');
            $table->timestamps();

            $table->foreign('lecture_id')->references('id')->on('lectures')->onDelete('cascade');
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lecture_part_id')->unsigned()->index();
            $table->string('question');
            $table->timestamps();

            $table->foreign('lecture_part_id')->references('id')->on('lecture_parts')->onDelete('cascade');
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned()->index();
            $table->string('answer');
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('answers');
        Schema::drop('questions');
        Schema::drop('lecture_parts');
        Schema::drop('lectures');
    }
}
