<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFillQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fillQuestions', function (Blueprint $table) {
            $table->increments('question_id');
            $table->string('name');
            $table->integer('teacher_id')->nullable();
            $table->string('question_type', 20);
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
            $table->string('slug')->unique();
            $table->tinyInteger('status')->default(1)->unsigned();
            $table->rememberToken();
            $table->softDeletes();
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
        Schema:: drop('fillQuestions');
    }
}
