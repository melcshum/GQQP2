<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TutorialQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iftutquestions', function (Blueprint $table) {
            $table->increments('iftutquestion_id');
            $table->integer('teacher_id')->nullable();
            $table->string('question_type', 20);
            $table->string('tutquestion', 1000);
            $table->integer('tutquestion_level');
            $table->string('program', 2000);
            $table->string('question_ans', 1);
            $table->string('mc_ans1', 100);
            $table->string('mc_ans2', 100);
            $table->string('mc_ans3', 100);
            $table->string('mc_ans4', 100);
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
        Schema::drop('iftutquestions');
    }
}
