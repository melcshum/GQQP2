<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(AccessTableSeeder::class);

        $this->call(HistoryTypeTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FillQuestionSeeder::class);
        $this->call(IfTutorialSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(McQuestionSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(Item_UserSeeder::class);
        $this->call(arrayTutorialSeeder::class);
        $this->call(loopTutorialSeeder::class);


        Model::reguard();
    }
}
