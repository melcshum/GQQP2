<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupLmsTable extends Migration
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

        Schema::dropIfExists(config('lms.game_question_table'));
    }
}
