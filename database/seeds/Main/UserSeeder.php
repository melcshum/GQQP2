<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            ['name' => 'test',
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => '2017-02-09 01:16:46',
                'updated_at' => '2017-02-09 01:16:46',
                'knowledge' => '3000',
                'gold' => '400',
            ],

            ['name' => 'alex',
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => '2017-02-09 01:16:46',
                'updated_at' => '2017-02-09 01:16:46',
                'knowledge' => '4000',
                'gold' => '3430',
            ],

            ['name' => 'ben',
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => '2017-02-09 01:16:46',
                'updated_at' => '2017-02-09 01:16:46',
                'knowledge' => '4540',
                'gold' => '5530',
            ],

            ['name' => 'candy',
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => '2017-02-09 01:16:46',
                'updated_at' => '2017-02-09 01:16:46',
                'knowledge' => '3490',
                'gold' => '3400',
            ],

            ['name' => 'david',
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => '2017-02-09 01:16:46',
                'updated_at' => '2017-02-09 01:16:46',
                'knowledge' => '4320',
                'gold' => '540',
            ],

            ['name' => 'Eve',
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => '2017-02-09 01:16:46',
                'updated_at' => '2017-02-09 01:16:46',
                'knowledge' => '4850',
                'gold' => '6300',
            ],

            ['name' => 'Ken',
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => '2017-02-09 01:16:46',
                'updated_at' => '2017-02-09 01:16:46',
                'knowledge' => '100',
                'gold' => '6520',
            ],

            ['name' => 'tommy',
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => '2017-02-09 01:16:46',
                'updated_at' => '2017-02-09 01:16:46',
                'knowledge' => '100',
                'gold' => '5490',
            ],

            ['name' => 'abc',
                'email' => 'abc@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => '2017-02-09 01:16:46',
                'updated_at' => '2017-02-09 01:16:46',
                'knowledge' => '10000',
                'gold' => '5430',
            ],

        );

        DB::table('users')->insert($users);
    }
}
