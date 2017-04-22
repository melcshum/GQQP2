<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudentSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('user_skill_id');
            $table->integer('user_id')->unsigned();
            $table->integer('if_else_point')->default(0);
            $table->integer('loop_point')->default(0);
            $table->integer('class_point')->default(0);
            $table->integer('array_point')->default(0);
            $table->integer('if_else_level')->default(0);
            $table->integer('loop_level')->default(0);
            $table->integer('class_level')->default(0);
            $table->integer('array_level')->default(0);

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema:: drop('skills');
    }
}
