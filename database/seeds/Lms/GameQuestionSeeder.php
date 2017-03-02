<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::table(config('lms.game_question_table'))->truncate();
        } elseif (DB::connection()->getDriverName() == 'sqlite') {
            DB::statement('DELETE FROM '.config('lms.game_question_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE '.config('lms.game_question_table').' CASCADE');
        }

        //Attach question to game
        $game_question = config('lms.providers.games.model');
        $game_question = new $game_question();
        $game_question::first()->attachQuestion(1);

                //Attach executive question to executive game
                $game_question = config('lms.providers.games.model');
                $game_question = new $game_question();
                $game_question::find(2)->attachQuestion(2);

                //Attach game question to general game
                $game_question = config('lms.providers.games.model');
                $game_question = new $game_question();
                $game_question::find(3)->attachQuestion(3);
        
        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
