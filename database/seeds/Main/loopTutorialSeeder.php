<?php

use Illuminate\Database\Seeder;

class loopTutorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('looptutquestions')->delete();

        $looptut = array(
            [   'name' => 'NoProgram',
                'teacher_id' => '1',
                'question_type' => 'loop',
                'tutquestion' => 'Which of these jump statements can skip processing remainder of code in its body for a particular iteration?',
                'tutquestion_level'=>'1',
                'program'=>'',
                'question_ans'=>'b',
                'mc_ans1'=>'break',
                'mc_ans2'=>'return',
                'mc_ans3'=>'exit',
                'mc_ans4'=>'continue',
                'photo'=>'',
                'slug' =>str_random(10),
                'created_at'=>new DateTime,
                'updated_at'=>new DateTime
            ],

            [   'name' => 'Program',
                'teacher_id' => '1',
                'question_type' => 'loop',
                'tutquestion' => ' How many times will the do-while loop below be ex- ecuted?',
                'tutquestion_level'=>'2',
                'program'=>'<pre>int m = 0; do { 
   System.out.println(m);
   m = m - 1;
    } while (m > 0);
</pre>',
                'question_ans'=>'b',
                'mc_ans1'=>' 0 times',
                'mc_ans2'=>' 1 times',
                'mc_ans3'=>' 10 times',
                'mc_ans4'=>'It is an infinite loop (ie. it will never stop executing)',
                'photo'=>'',
                'slug' =>str_random(10),
                'created_at'=>new DateTime,
                'updated_at'=>new DateTime
            ],

            [   'name' => 'Program',
                'teacher_id' => '1',
                'question_type' => 'loop',
                'tutquestion' => 'What is the output of the code segment below?',
                'tutquestion_level'=>'4',
                'program'=>'<pre>
String message = "Sally is counting: ";
String numbers = "";
for (int i = 0; i < 12; i += 2)
   numbers = numbers + i + " ";
System.out.println(message + numbers);

</pre>',
                'question_ans'=>'a',
                'mc_ans1'=>'Sally is counting: 0 2 4 6 8 10',
                'mc_ans2'=>'Sally is counting: 0 1 2 3 4 5 6 7 8 9 10 11',
                'mc_ans3'=>'Sally is counting: 0 2 4 6 8 10 12',
                'mc_ans4'=>'Sally is counting: 0 1 2 3 4 5 6 7 8 9 10 11 12',
                'photo'=>'',
                'slug' =>str_random(10),
                'created_at'=>new DateTime,
                'updated_at'=>new DateTime
            ],
        );

        DB::table('looptutquestions')->insert($looptut);
    }
}
