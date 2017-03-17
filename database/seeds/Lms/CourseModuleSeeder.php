<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseModuleSeeder extends Seeder
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
            DB::table(config('lms.course_module_table'))->truncate();
        } elseif (DB::connection()->getDriverName() == 'sqlite') {
            DB::statement('DELETE FROM '.config('lms.course_module_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE '.config('lms.course_module_table').' CASCADE');
        }

        //Attach question to game
        $course_module = config('lms.providers.courses.model');
        $course_module = new $course_module();
        $course_module::first()->attachModule(1);

        //Attach executive question to executive game
        $course_module = config('lms.providers.courses.model');
        $course_module = new $course_module();
        $course_module::find(2)->attachModule(2);

        //Attach game question to general game
        $course_module = config('lms.providers.courses.model');
        $course_module = new $course_module();
        $course_module::find(3)->attachModule(3);

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
