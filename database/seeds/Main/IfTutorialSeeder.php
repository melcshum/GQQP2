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
            ['teacher_id' => '1',
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
                'created_at'=>new DateTime,
                'updated_at'=>new DateTime
            ],
        );

        DB::table('iftutquestions')->insert($iftut);
    }
}
