<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleLessonSeeder extends Seeder
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
            DB::table(config('lms.module_lesson_table'))->truncate();

        } elseif (DB::connection()->getDriverName() == 'sqlite') {
            DB::statement('DELETE FROM '.config('lms.module_lesson_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE '.config('lms.module_lesson_table').' CASCADE');
        }

        //Attach question to game
        $module_lesson = config('lms.providers.modules.modelB');
        $module_lesson = new $module_lesson();
        $module_lesson::first()->attachLesson(1);

        //Attach executive question to executive game
        $module_lesson = config('lms.providers.modules.modelB');
        $module_lesson = new $module_lesson();
        $module_lesson::find(2)->attachLesson(2);

        //Attach game question to general game
        $module_lesson = config('lms.providers.modules.modelB');
        $module_lesson = new $module_lesson();
        $module_lesson::find(3)->attachLesson(3);

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }

}
