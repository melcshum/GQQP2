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
        $this->call(CourseTableSeeder::class);
        $this->call(QuestionTableSeeder::class);

        $this->call(HistoryTypeTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ModuleTableSeeder::class);
        $this->call(GameTableSeeder::class);
        $this->call(GameQuestionSeeder::class);
        $this->call(LessonTableSeeder::class);
        $this->call(CourseModuleSeeder::class);
        $this->call(ModuleLessonSeeder::class);
        $this->call(ModuleGameSeeder::class);
        $this->call(FillQuestionSeeder::class);
        $this->call(IfTutorialSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(McQuestionSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(Item_UserSeeder::class);

        Model::reguard();
    }
}
