<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFullQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fullQuestions', function (Blueprint $table) {
            $table->increments('question_id');
            $table->integer('teacher_id')->nullable();
            $table->string('question_type', 20);
            $table->string('type',10);
            $table->integer('question_level');
            $table->string('question', 1000);
            $table->string('program', 2000);
            $table->string('ans1', 50);
            $table->string('ans2', 50)->nullable();
            $table->string('ans3', 50)->nullable();
            $table->string('ans4', 50)->nullable();
            $table->string('ans5', 50)->nullable();
            $table->integer('knowledge');
            $table->integer('gold');
            $table->integer('time');
            $table->string('hint',300);
            $table->string('photo',200);
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
        Schema:: drop('fullQuestions');
    }
}
