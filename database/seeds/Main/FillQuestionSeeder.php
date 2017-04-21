<?php

use Illuminate\Database\Seeder;

class FillQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fullQuestions')->delete();

        $fillquestions = array(['question_id'=>1, 'teacher_id'=>1, 'question_type'=>'class','type'=>"fill",'question_level'=>3,'question'=>'Create Hello class and have a main class to print "Hello class":'
            ,'program'=>'<pre>public class 1.<input type="text" id="ans1" name="ans1">{
	public 2. <input type="text" id="ans2" name="ans2"> 3.<input type="text" id="ans3" name="ans3"> 4.<input type="text" id="ans4" name="ans4">(String [] args){
		5.<input type="text" id="ans5" name="ans5">.print("Hello class");
	}
}
</pre>'
            ,'ans1'=>'Hello','ans2'=>'static','ans3'=>'vold','ans4'=>'main','ans5'=>'System.out','knowledge'=>20,'gold'=>200,'time'=>90,'hint'=>'<li>Class name</li>
						<li>about the main class</li>
						<li>about the main class</li>
						<li>about the main class</li>
						<li>java basic library to print</li>','photo'=>'./images/ans1.JPG'],

        );

        DB::table('fullQuestions')->insert($fillquestions);
    }
}
