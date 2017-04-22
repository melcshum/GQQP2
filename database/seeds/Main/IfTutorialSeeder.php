<?php

use Illuminate\Database\Seeder;

class IfTutorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('iftutquestions')->delete();

        $iftut = array(
            [   'name' => 'Program',
                'teacher_id' => '1',
                'question_type' => 'if_else',
                'tutquestion' => 'What is the output result in this program',
                'tutquestion_level'=>'1',
                'program'=>'<pre>public class Test {

   public static void main(String args[]) {
      int x = 30;

      if( x < 20 ) {
         System.out.print("This is if statement");
      }else {
         System.out.print("This is else statement");
      }
   }
}</pre>',
                'question_ans'=>'c',
                'mc_ans1'=>'This is if statement',
                'mc_ans2'=>'Error',
                'mc_ans3'=>'This is else statement',
                'mc_ans4'=>'Nothing to output',
                'photo'=>'',
                'slug' =>str_random(10),
                'created_at'=>new DateTime,
                'updated_at'=>new DateTime
            ],

            [   'name' => 'NoProgram',
                'teacher_id' => '1',
                'question_type' => 'if_else',
                'tutquestion' => 'Which of these are selection statements in Java?',
                'tutquestion_level'=>'2',
                'program'=>'',
                'question_ans'=>'a',
                'mc_ans1'=>'if()',
                'mc_ans2'=>'for()',
                'mc_ans3'=>'continue',
                'mc_ans4'=>'break',
                'photo'=>'',
                'slug' =>str_random(10),
                'created_at'=>new DateTime,
                'updated_at'=>new DateTime
            ],

            [   'name' => 'Program',
                'teacher_id' => '1',
                'question_type' => 'if_else',
                'tutquestion' => 'What will be assigned to the variable result after ex- ecution of the statements below, if the value that is entered by the user is -1?',
                'tutquestion_level'=>'4',
                'program'=>'<pre>int something = console.nextInt();
String result;
	if (something <= 0)
		result = "ONE";

	else if (something <= 50)
		result = "TWO";
	if (something <= 100)
		result = "THREE"
	else
	result = "FOUR";
</pre>',
                'question_ans'=>'a',
                'mc_ans1'=>'One',
                'mc_ans2'=>'Two',
                'mc_ans3'=>'Three',
                'mc_ans4'=>'Four',
                'photo'=>'',
                'slug' =>str_random(10),
                'created_at'=>new DateTime,
                'updated_at'=>new DateTime
            ],
        );

        DB::table('iftutquestions')->insert($iftut);
    }
}
