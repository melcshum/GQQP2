<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->delete();

        $items = array(
            ['item_name' => 'Change Question',
                'description' => 'user can displace to another question in Challenge Mode',
                'price' => '500'
            ],

            ['item_name' => '50/50',
                'description' => 'user can filter 2 incorrecct answer in Challenge Mode (Multiple Choice Only)',
                'price' => '1000'
            ],

            ['item_name' => 'Extra time',
                'description' => 'user can get an extra time in the Challenge Mode',
                'price' => '2000'
            ],);

        DB::table('items')->insert($items);
    }
}
