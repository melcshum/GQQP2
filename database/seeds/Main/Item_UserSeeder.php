<?php

use Illuminate\Database\Seeder;

class Item_UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_user')->delete();

        $item_user = array(
            ['user_id' => '1',
                'item_id' => '1',
            ],

            ['user_id' => '1',
                'item_id' => '2',
            ],

            ['user_id' => '1',
                'item_id' => '3',
            ],

            ['user_id' => '2',
                'item_id' => '1',
            ],

            ['user_id' => '2',
                'item_id' => '2',
            ],

            ['user_id' => '2',
                'item_id' => '3',
            ],

            ['user_id' => '3',
                'item_id' => '1',
            ],

            ['user_id' => '3',
                'item_id' => '2',
            ],

            ['user_id' => '3',
                'item_id' => '3',
            ],

            ['user_id' => '4',
                'item_id' => '1',
            ],

            ['user_id' => '4',
                'item_id' => '2',
            ],

            ['user_id' => '4',
                'item_id' => '3',
            ],

            ['user_id' => '5',
                'item_id' => '1',
            ],

            ['user_id' => '5',
                'item_id' => '2',
            ],

            ['user_id' => '5',
                'item_id' => '3',
            ],

            ['user_id' => '6',
                'item_id' => '1',
            ],

            ['user_id' => '6',
                'item_id' => '2',
            ],

            ['user_id' => '6',
                'item_id' => '3',
            ],

            ['user_id' => '7',
                'item_id' => '1',
            ],

            ['user_id' => '7',
                'item_id' => '2',
            ],

            ['user_id' => '7',
                'item_id' => '3',
            ],

            ['user_id' => '8',
                'item_id' => '1',
            ],

            ['user_id' => '8',
                'item_id' => '2',
            ],

            ['user_id' => '8',
                'item_id' => '3',
            ],

            ['user_id' => '9',
                'item_id' => '1',
            ],

            ['user_id' => '9',
                'item_id' => '2',
            ],

            ['user_id' => '9',
                'item_id' => '3',
            ],

        );

        DB::table('item_user')->insert($item_user);
    }
}
