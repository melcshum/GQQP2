<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMcQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcQuestions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('teacher_id')->nullable();
            $table->string('question_type', 20);
            $table->integer('question_level');
            $table->string('question', 1000);
            $table->string('program', 2000);
            $table->string('question_ans', 1);
            $table->string('mc_ans1', 100);
            $table->string('mc_ans2', 100);
            $table->string('mc_ans3', 100);
            $table->string('mc_ans4', 100);
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
        Schema:: drop('mcQuestions');
    }
}
