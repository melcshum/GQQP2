<?php

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = array(
            ['user_id' => '1',
                'if_else_point' => '0',
                'loop_point' => '0',
                'array_point' => '0',
                'if_else_level' => '0',
                'loop_level' => '0',
                'array_level' => '0',
            ],

            ['user_id' => '2',
                'if_else_point' => '0',
                'loop_point' => '0',
                'array_point' => '0',
                'if_else_level' => '0',
                'loop_level' => '0',
                'array_level' => '0',
            ],

            ['user_id' => '3',
                'if_else_point' => '0',
                'loop_point' => '0',
                'array_point' => '0',
                'if_else_level' => '0',
                'loop_level' => '0',
                'array_level' => '0',
            ],

            ['user_id' => '4',
                'if_else_point' => '300',
                'loop_point' => '400',
                'array_point' => '234',
                'if_else_level' => '1',
                'loop_level' => '2',
                'array_level' => '1',
            ],

            ['user_id' => '5',
                'if_else_point' => '482',
                'loop_point' => '134',
                'array_point' => '542',
                'if_else_level' => '1',
                'loop_level' => '1',
                'array_level' => '1',
            ],

            ['user_id' => '6',
                'if_else_point' => '234',
                'loop_point' => '521',
                'array_point' => '241',
                'if_else_level' => '1',
                'loop_level' => '1',
                'array_level' => '1',
            ],

            ['user_id' => '7',
                'if_else_point' => '34',
                'loop_point' => '52',
                'array_point' => '63',
                'if_else_level' => '1',
                'loop_level' => '1',
                'array_level' => '1',
            ],

            ['user_id' => '8',
                'if_else_point' => '543',
                'loop_point' => '342',
                'array_point' => '234',
                'if_else_level' => '1',
                'loop_level' => '1',
                'array_level' => '1',
            ],

            ['user_id' => '9',
                'if_else_point' => '263',
                'loop_point' => '435',
                'array_point' => '132',
                'if_else_level' => '1',
                'loop_level' => '2',
                'array_level' => '2',
            ],

            ['user_id' => '10',
                'if_else_point' => '342',
                'loop_point' => '425',
                'array_point' => '234',
                'if_else_level' => '1',
                'loop_level' => '1',
                'array_level' => '1',
            ],

            ['user_id' => '11',
                'if_else_point' => '300',
                'loop_point' => '400',
                'array_point' => '234',
                'if_else_level' => '1',
                'loop_level' => '1',
                'array_level' => '1',
            ],

            ['user_id' => '12',
                'if_else_point' => '300',
                'loop_point' => '63',
                'array_point' => '343',
                'if_else_level' => '1',
                'loop_level' => '1',
                'array_level' => '1',
            ],

        );

        DB::table('skills')->insert($skills);
    }
}
