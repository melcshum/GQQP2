<?php

use Illuminate\Database\Seeder;

class arrayTutorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('arraytutquestions')->delete();

        $arraytut = array(
            ['name' => 'NoProgram',
                'teacher_id' => '1',
                'question_type' => 'array',
                'tutquestion' => 'Which of these operators is used to allocate memory to array variable in Java?',
                'tutquestion_level'=>'1',
                'program'=>'',
                'question_ans'=>'c',
                'mc_ans1'=>'malloc',
                'mc_ans2'=>'alloc',
                'mc_ans3'=>'new ',
                'mc_ans4'=>'new malloc',
                'photo'=>'',
                'slug' =>str_random(10),
                'created_at'=>new DateTime,
                'updated_at'=>new DateTime
            ],

            [   'name' => 'Program',
                'teacher_id' => '1',
                'question_type' => 'array',
                'tutquestion' => 'Which three are legal array declarations?',
                'tutquestion_level'=>'2',
                'program'=>'<pre>
1.int [] myScores [];
2.char [] myChars;
3.int [6] myScores;
4.Dog myDogs [];
5.Dog myDogs [7];</pre>',
                'question_ans'=>'a',
                'mc_ans1'=>'1, 2, 4',
                'mc_ans2'=>'2, 4, 5',
                'mc_ans3'=>'2, 3, 4',
                'mc_ans4'=>'All are correct',
                'photo'=>'',
                'slug' =>str_random(10),
                'created_at'=>new DateTime,
                'updated_at'=>new DateTime
            ],

            [   'name' => 'NoProgram',
                'teacher_id' => '1',
                'question_type' => 'array',
                'tutquestion' => 'Which cause a compiler error?',
                'tutquestion_level'=>'4',
                'program'=>'',
                'question_ans'=>'b',
                'mc_ans1'=>'int[ ] scores = {3, 5, 7};',
                'mc_ans2'=>'int [ ][ ] scores = {2,7,6}, {9,3,45};',
                'mc_ans3'=>'String cats[ ] = {"Fluffy", "Spot", "Zeus"};',
                'mc_ans4'=>'boolean results[ ] = new boolean [] {true, false, true};',
                'photo'=>'',
                'slug' =>str_random(10),
                'created_at'=>new DateTime,
                'updated_at'=>new DateTime
            ],
        );

        DB::table('arraytutquestions')->insert($arraytut);
    }
}
