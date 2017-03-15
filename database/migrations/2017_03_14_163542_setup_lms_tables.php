<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupLmsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('lms.game_question_table'), function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('game_id')->unsigned();
            $table->integer('question_id')->unsigned();

            /*
             * Add Foreign/Unique/Index
             */
            $table->foreign('game_id')
                ->references('id')
                ->on(config('lms.games_table'))
                ->onDelete('cascade');

            $table->foreign('question_id')
                ->references('id')
                ->on(config('lms.questions_table'))
                ->onDelete('cascade');
        });

        Schema::create(config('lms.course_module_table'), function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->integer('module_id')->unsigned();

            /*
             * Add Foreign/Unique/Index
             */
            $table->foreign('course_id')
                ->references('id')
                ->on(config('lms.courses_table'))
                ->onDelete('cascade');

            $table->foreign('module_id')
                ->references('id')
                ->on(config('lms.modules_table'))
                ->onDelete('cascade');
        });

        Schema::create(config('lms.module_lesson_table'), function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('module_id')->unsigned();
            $table->integer('lesson_id')->unsigned();

            /*
             * Add Foreign/Unique/Index
             */
            $table->foreign('module_id')
                ->references('id')
                ->on(config('lms.modules_table'))
                ->onDelete('cascade');

            $table->foreign('lesson_id')
                ->references('id')
                ->on(config('lms.lessons_table'))
                ->onDelete('cascade');
        });

        Schema::create(config('lms.module_game_table'), function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('module_id')->unsigned();
            $table->integer('game_id')->unsigned();

            /*
             * Add Foreign/Unique/Index
             */
            $table->foreign('module_id')
                ->references('id')
                ->on(config('lms.modules_table'))
                ->onDelete('cascade');

            $table->foreign('game_id')
                ->references('id')
                ->on(config('lms.games_table'))
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table(config('lms.game_question_table'), function (Blueprint $table) {
            $table->dropForeign(config('lms.game_question_table').'_game_id_foreign');
            $table->dropForeign(config('lms.game_question_table').'_question_id_foreign');
        });

        Schema::table(config('lms.course_module_table'), function (Blueprint $table) {
            $table->dropForeign(config('lms.course_module_table').'_course_id_foreign');
            $table->dropForeign(config('lms.course_module_table').'_module_id_foreign');
        });

        Schema::table(config('lms.module_lesson_table'), function (Blueprint $table) {
            $table->dropForeign(config('lms.module_lesson_table').'_module_id_foreign');
            $table->dropForeign(config('lms.module_lesson_table').'_lesson_id_foreign');
        });

        Schema::table(config('lms.module_game_table'), function (Blueprint $table) {
            $table->dropForeign(config('lms.module_game_table').'_module_id_foreign');
            $table->dropForeign(config('lms.module_game_table').'_game_id_foreign');
        });

        Schema::dropIfExists(config('lms.game_question_table'));
        Schema::dropIfExists(config('lms.course_module_table'));
        Schema::dropIfExists(config('lms.module_lesson_table'));
        Schema::dropIfExists(config('lms.module_game_table'));
    }
}
