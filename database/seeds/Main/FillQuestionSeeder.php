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
        DB::table('fillQuestions')->delete();

        $fillquestions = array(
            ['id'=>1, 'name'=>"Q1",'teacher_id'=>1, 'question_type'=>'class','question_level'=>3,'question'=>'Create Hello class and have a main class to print "Hello class":'
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
						<li>java basic library to print</li>','photo'=>'./images/ans1.JPG', 'created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q2

            ['id'=>2, 'name'=>"Q2",'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>3,'question'=>'Complete the fill in the blank to complete the program:'
                ,'program'=>'<pre>public class mark{
	public static void main(String [] args){
	    int mark = 73;
		if(mark <input type="text" id="ans1" name="ans1"> 40){
		    System.out.println("Fail");
		}else if(mark >= 40 && mark <input type="text" id="ans2" name="ans2"> 60){
		    System.out.println("Pass");
		}else if(mark >= <input type="text" id="ans3" name="ans3"> <input type="text" id="ans4" name="ans4"> mark < 80){
		    System.out.println("<input type="text" id="ans5" name="ans5">");
		}else{
		    System.out.println("Excellent");
		}
	}
}
</pre>'
                ,'ans1'=>'<','ans2'=>'<','ans3'=>'60','ans4'=>'&&','ans5'=>'Good','knowledge'=>40,'gold'=>200,'time'=>90,'hint'=>'<li>Should mark bigger or smaller than 40?</li>
						<li>mark should be smaller or smaller than 60?</li>
						<li>What is the best number to use in this situation?</li>
						<li>It should use and / or ?</li>
						<li>What is the final result?</li>','photo'=>'./images/fillQuestion/ans2.JPG', 'created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q3

            ['id'=>3, 'name'=>"Q3",'teacher_id'=>1, 'question_type'=>'array','question_level'=>4,'question'=>'Complete the fill in the blank to complete the program:'
                ,'program'=>'<pre>public class array{
	public static void main(String [] args){
		int[] a = new int[<input type="text" id="ans1" name="ans1">];
 
        a[1] = 50;
 
        Object o = a;
 
        int[] b = (int[])<input type="text" id="ans2" name="ans2">;
 
        b[1] = <input type="text" id="ans3" name="ans3">;
 
        System.out.println(a[1]);
 
        ((int[])o)[1] = <input type="text" id="ans4" name="ans4">;
 
        System.out.println(a[<input type="text" id="ans5" name="ans5">]);
	}
}
</pre>'
                ,'ans1'=>'3','ans2'=>'o','ans3'=>'100','ans4'=>'500','ans5'=>'1','knowledge'=>90,'gold'=>300,'time'=>180,'hint'=>'<li>It needs 3 space for "a"</li>
						<li>What is the object name?</li>
						<li>What is the first output?</li>
						<li>What is the second output?</li>
						<li>Is object o equals to a ?</li>','photo'=>'./images/fillQuestion/ans3.JPG', 'created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q4

            ['id'=>4, 'name'=>"Q4",'teacher_id'=>1, 'question_type'=>'loop','question_level'=>2,'question'=>'Complete the fill in the blank to complete the program:'
                ,'program'=>'<pre>
public class SimpleWhileEx {
 
    public static void main(String a[]){
        int i = <input type="text" id="ans1" name="ans1">;
        while(i <input type="text" id="ans2" name="ans2"> 10){
            System.out.print(<input type="text" id="ans3" name="ans3">+" ");
            i = i + <input type="text" id="ans4" name="ans4">;
            <input type="text" id="ans5" name="ans5">
        }
    }
}
</pre>'
                ,'ans1'=>'0','ans2'=>'<','ans3'=>'i','ans4'=>'1','ans5'=>'System.out.println("");','knowledge'=>40,'gold'=>200,'time'=>180,
                'hint'=>'<li>this block will executed until</li>
            <li>i value became 10</li>','photo'=>'./images/fillQuestion/ans4.JPG', 'created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],


        );

        DB::table('fillQuestions')->insert($fillquestions);
    }
}
