<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleGameSeeder extends Seeder
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
            DB::table(config('lms.module_game_table'))->truncate();
        } elseif (DB::connection()->getDriverName() == 'sqlite') {
            DB::statement('DELETE FROM '.config('lms.module_game_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE '.config('lms.module_game_table').' CASCADE');
        }

        //Attach question to game
        $module_game = config('lms.providers.modules.model');
        $module_game = new $module_game();
        $module_game::first()->attachGame(1);

        //Attach executive question to executive game
        $module_game = config('lms.providers.modules.model');
        $module_game = new $module_game();
        $module_game::find(2)->attachGame(2);

        //Attach game question to general game
        $module_game = config('lms.providers.modules.model');
        $module_game = new $module_game();
        $module_game::find(3)->attachGame(3);

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
