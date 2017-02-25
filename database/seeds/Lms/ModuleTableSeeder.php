<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::table(config('lms.modules_table'))->truncate();
        } elseif (DB::connection()->getDriverName() == 'sqlite') {
            DB::statement('DELETE FROM '.config('lms.modules_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE '.config('lms.modules_table').' CASCADE');
        }

        $modules = [
            [
                'name'              => str_random(10),
                'description'       => str_random(100),
                'level'             => 1,
                'type'              => 1,
                'slug'              => str_random(10),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'name'              => str_random(10),
                'description'       => str_random(100),
                'level'             => 2,
                'type'              => 1,
                'slug'              => str_random(10),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'name'              => str_random(10),
                'description'       => str_random(100),
                'level'             => 3,
                'type'              => 1,
                'slug'              => str_random(10),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        DB::table(config('lms.modules_table'))->insert($modules);


        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
