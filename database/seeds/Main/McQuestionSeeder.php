<?php

use Illuminate\Database\Seeder;

class McQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('mcQuestions')->delete();

        $mcquestions = array(
            ['id'=>1, 'name'=>'print star', 'teacher_id'=>1,'question_type'=>'if_else','question_level'=>1,'question'=>'What is the correct answer to make the output like below? The output is shown as below:','program'=>'<pre>public class star{
	public static void main (String [] args){
		printStars();
	}

	static void printStars(){
		int i = <input type="text" name="ans1" disabled >;
		int j = 1;
		if(i == 0){
		    System.out.println("Hello class");
		}
		else{
		    System.out.println("Bye class");
		}
		
	}
}</pre>',

                'question_ans'=>'a','mc_ans1'=>'0','mc_ans2' =>'1','mc_ans3'=>'-1','mc_ans4'=>'2','knowledge'=>10,'gold'=>100,'time'=>30, 'hint'=>'<p>Is i or j equal 0?</p>',
                'photo'=>'./images/mcQuestion/ans1.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],


            ['id'=>2,'name'=>'print star 2', 'teacher_id'=>1, 'question_type'=>'loop','question_level'=>1,'question'=>'Write a Java program by using two for loops to product the output shown below:','program'=>'<pre>public class star{

	public static void main (String [] args){
		printStars();
	}

	static void printStars(){
		int i,j;
		for<input type="text" name="ans1" disabled >{
			System.out.println("");
			for<input type="text" name="ans2" disabled>{
				System.out.print("*");
			}
		}
	}
}</pre>',
                'question_ans'=>'a',
                'mc_ans1'=>'<br>(i=0;i<=6;i++)<br>(j=0;j<7-i;j++)<br>',
                'mc_ans2' =>'<br>(i=0;i<=6;i++)<br>(j=0;j<=7-i;j++)<br>'
                ,'mc_ans3'=>'<br>(i=0;i<=6;i++)<br>(j=0;j<=7-i;j--)<br>'
                ,'mc_ans4'=>'<br>(i=0;i<=6;i++)<br>(j=0;j<=7+i;j--)<br>',
                'knowledge'=>10,'gold'=>100,'time'=>60,'hint'=>'<p>here are 7 line</p>
<p>The first line will print 7 * in line1</p>.<p>The second line will print 6 * in line2</p>','photo'=>'./images/mcQuestion/ans2.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q3

            ['id'=>3,'name'=>'if_else 1', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>1
                ,'question'=>'What does the user input? The output is shown as below:','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
		test();
	}

	static void test(){
		System.out.println("Input a number");
		Scanner in = new Scanner(System.in);
		int something = in.nextInt();
		String result;

		if (something == 1)
		   result = "ONE";
		else if (something == 2)
		   result = "TWO";
		else if (something == 3)
		   result = "THREE";
		else
		   result = "FOUR";
		System.out.println(result);
	}
}</pre>',
                'question_ans'=>'a',
                'mc_ans1'=>'<br>1<br>',
                'mc_ans2' =>'<br>2<br>'
                ,'mc_ans3'=>'<br>3<br>'
                ,'mc_ans4'=>'<br>4<br>',
                'knowledge'=>25,'gold'=>400,'time'=>60,'hint'=>'<p>If>ElseIf>Else</p>','photo'=>'./images/mcQuestion/ans3.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q4

            ['id'=>4,'name'=>'if_else 2', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>2
                ,'question'=>'What is the correct answer to make the output like below? The output is shown as below:','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
		test();
	}

	static void test(){
		System.out.print("Enter marks : ");
		Scanner in = new Scanner(System.in);
		int marks = in.nextInt();
		if <input type="text" name="ans1" disabled >
		   System.out.println("Fail");
		else if ( marks >= 50 && marks <= 59)
		   System.out.println("Pass");
		else if( marks > 59 && marks <= 79 )
		   System.out.println("Credit");
		else if ( marks > 79 && marks <= 88 )
		   System.out.println("Distinction");
		else
		   System.out.println("High-Distinction");

	}
}</pre>',
                'question_ans'=>'b',
                'mc_ans1'=>'<br>( marks > 50 )<br>',
                'mc_ans2' =>'<br>( marks < 50 )<br>'
                ,'mc_ans3'=>'<br>( marks == 50 )<br>'
                ,'mc_ans4'=>'<br>( marks != 50 )<br>',
                'knowledge'=>20,'gold'=>200,'time'=>120,'hint'=>'<p>If>ElseIf>Else</p>','photo'=>'./images/mcQuestion/ans4.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q5

            ['id'=>5,'name'=>'if_else 3', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>2
                ,'question'=>'What is the correct answer to make the output like below? The output is shown as below:','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
		System.out.print("Enter marks : ");
		Scanner in = new Scanner(System.in);
		int marks = in.nextInt();
		if (marks < 50)
		   System.out.println("Fail");
		else if ( marks >= 50 && marks < 80)
		   System.out.println("Pass");
		else if <input type="text" name="ans1" disabled >
		   System.out.println("Great");
	}
}</pre>',
                'question_ans'=>'b',
                'mc_ans1'=>'<br>( marks != 80 )<br>',
                'mc_ans2' =>'<br>( marks >= 80 )<br>'
                ,'mc_ans3'=>'<br>( marks >= 79 )<br>'
                ,'mc_ans4'=>'<br>( marks != 79 )<br>',
                'knowledge'=>20,'gold'=>200,'time'=>120,'hint'=>'<p>If>ElseIf>Else</p>','photo'=>'./images/mcQuestion/ans5.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q6

            ['id'=>6,'name'=>'if_else 4', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>4
                ,'question'=>'What is the correct answer to make the output like below? The output is shown as below:','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
		int x = 43;
		if (x > 50 <input type="text" name="ans1" disabled > x > 0)
              System.out.println("Success!");
           else
              System.out.println("Failure!");

	}
}</pre>',
                'question_ans'=>'d',
                'mc_ans1'=>'<br>||<br>',
                'mc_ans2' =>'<br>or<br>'
                ,'mc_ans3'=>'<br>and<br>'
                ,'mc_ans4'=>'<br>&&<br>',
                'knowledge'=>40,'gold'=>350,'time'=>180,'hint'=>'<p>If>ElseIf>Else</p>','photo'=>'./images/mcQuestion/ans6.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q7

            ['id'=>7,'name'=>'if_else 5', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>3
                ,'question'=>'What is the correct answer to make the output like below? The output is shown as below:','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
		int var1 = 5; 
        int var2 = 7;
        if ((var2 - 1) == var1)
            System.out.println(var1);
        else 
            System.out.println(<input type="text" name="ans1" disabled >);
    }
}</pre>',
                'question_ans'=>'c',
                'mc_ans1'=>'<br>var1 + 3<br>',
                'mc_ans2' =>'<br>var1 + 1<br>',
                'mc_ans3'=>'<br>var2<br>',
                'mc_ans4'=>'<br>var2 - 1<br>',
                'knowledge'=>30,'gold'=>300,'time'=>120,'hint'=>'<p>Is 7 - 1 = 5?</p>','photo'=>'./images/mcQuestion/ans7.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q8

            ['id'=>8,'name'=>'if_else 6', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>3
                ,'question'=>'What is the correct answer to make the output like below? The output is shown as below:','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
        int sum = 14;
        if ( sum < 20 ){
            <input type="text" name="ans1" disabled > 
            System.out.print(sum);
          }
        else{
            sum = sum - 10;
            System.out.print(sum);
          }
    }
}</pre>',
                'question_ans'=>'b',
                'mc_ans1'=>'<br>sum = sum + 2.0;<br>',
                'mc_ans2' =>'<br> sum = sum + 20;<br>'
                ,'mc_ans3'=>'<br> sum + 20;<br>'
                ,'mc_ans4'=>'<br>sum = sum;<br>',
                'knowledge'=>20,'gold'=>180,'time'=>120,'hint'=>'<p>Is 14 bigger than 20?</p>','photo'=>'./images/mcQuestion/ans8.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q9

            ['id'=>9,'name'=>'if_else 7', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>3
                ,'question'=>'What is the value of the "?" in the output? ','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
        int num = 14;
		if ( num < 20 )
		  System.out.print("Under ");
		else
		  System.out.print("Over  ");
		System.out.println("the limit.");
    }
}</pre>',
                'question_ans'=>'b',
                'mc_ans1'=>'<br>Under<br>',
                'mc_ans2' =>'<br>Under the limit.<br>'
                ,'mc_ans3'=>'<br>Over the limit.<br>'
                ,'mc_ans4'=>'<br>the limit.<br>',
                'knowledge'=>25,'gold'=>200,'time'=>120,'hint'=>'<p>Is 14 smaller than 20?</p><p>Is the next println insert the if_else statment?</p>','photo'=>'./images/mcQuestion/ans9.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q10

            ['id'=>10,'name'=>'if_else 8', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>4
                ,'question'=>'What is the value of the "?" in the output ? ','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
		int num = 54;
		int limit = 90;
		if ( num < limit )
		  System.out.println("Lower ");
		else{
		  System.out.print("Higher ");
		System.out.println("than the limit.");
		}
	}
}</pre>',
                'question_ans'=>'b',
                'mc_ans1'=>'<br>Higher <br>',
                'mc_ans2' =>'<br>Lower <br>'
                ,'mc_ans3'=>'<br>Higher than the limit.<br>'
                ,'mc_ans4'=>'<br>Lower than the limit.<br>',
                'knowledge'=>25,'gold'=>200,'time'=>120,'hint'=>'<p>Is 54 smaller than 90?</p><p>Is the next println insert the if_else statment?</p>','photo'=>'./images/mcQuestion/ans10.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q11

            ['id'=>11,'name'=>'if_else 9', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>3
                ,'question'=>'What is the correct answer to make the output like below? The output is shown as below:','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
		int num1 = 1;
		int num2 = 3;
		if ( num1 < num2 )
		  <input type="text" name="ans1" disabled > 
		else
		  num1 = num2;
		System.out.println(num1);
		
	}
}</pre>',
                'question_ans'=>'d',
                'mc_ans1' =>'<br>num2 = num1 + num2; <br>',
                'mc_ans2' =>'<br>num2 = num1 + 1; <br>'
                ,'mc_ans3'=>'<br>num1 = num1 + num1;<br>'
                ,'mc_ans4'=>'<br>num1 = num1 + num2;<br>',
                'knowledge'=>30,'gold'=>200,'time'=>120,'hint'=>'<p>Is 1 smaller than 3?</p><p>What is the value that need to output?</p>','photo'=>'./images/mcQuestion/ans11.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q12

            ['id'=>12,'name'=>'if_else 10', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>2
                ,'question'=>'What is the correct answer to make the output like below? The output is shown as below:','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
		int num1 = 109;
		int num2 = <input type="text" name="ans1" disabled > ;
		if ( num1 < num2 )
		  num1 = num1 + num2;
		else
		  num1 = num2;
		System.out.println(num1);
			
	}
}</pre>',
                'question_ans'=>'c',
                'mc_ans1' =>'<br>num1 + 10<br>',
                'mc_ans2' =>'<br>num2<br>'
                ,'mc_ans3'=>'<br>89<br>'
                ,'mc_ans4'=>'<br>109-40<br>',
                'knowledge'=>25,'gold'=>170,'time'=>120,'hint'=>'<p>Would num1 bigger than num2?</p>','photo'=>'./images/mcQuestion/ans12.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q13

            ['id'=>13,'name'=>'if_else 11', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>1
                ,'question'=>'What is the value of the "?" in the output? ','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
		int num1 = 43;
		int num2 = 32;
		if ( num1 > num2 )
		  num1 = num1 - num2;
		else
		  num1 = num2;
		System.out.println(num1);
				
	}
}</pre>',
                'question_ans'=>'a',
                'mc_ans1' =>'<br>num1 + 10<br>',
                'mc_ans2' =>'<br>num2<br>'
                ,'mc_ans3'=>'<br>89<br>'
                ,'mc_ans4'=>'<br>109-40<br>',
                'knowledge'=>10,'gold'=>100,'time'=>40,'hint'=>'<p>Would num1 bigger than num2?</p>','photo'=>'./images/mcQuestion/ans13.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q14

            ['id'=>14,'name'=>'if_else 12', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>2
                ,'question'=>'What is the value of the "?" in the output? ','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
		String value = "";
		if ( value.equals("") )
		  System.out.println("abc");
		else
		  System.out.println("123");
	}		
	
}</pre>',
                'question_ans'=>'a',
                'mc_ans1' =>'<br>abc<br>',
                'mc_ans2' =>'<br>123<br>'
                ,'mc_ans3'=>'<br>""<br>'
                ,'mc_ans4'=>'<br>abc123<br>',
                'knowledge'=>10,'gold'=>100,'time'=>30,'hint'=>'<p>Would num1 bigger than num2?</p>','photo'=>'./images/mcQuestion/ans14.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q15

            ['id'=>15,'name'=>'if_else 13', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>2
                ,'question'=>'What is the correct answer to make the output like below? The output is shown as below:','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
		String value = "a";
		if ( value<input type="text" name="ans1" disabled >("b") )
		  System.out.println("Yes, it is.");
		else
		  System.out.println("No, it is not.");
	}		
	
}</pre>',
                'question_ans'=>'d',
                'mc_ans1' =>'<br>.equal<br>',
                'mc_ans2' =>'<br>equal<br>'
                ,'mc_ans3'=>'<br>=<br>'
                ,'mc_ans4'=>'<br>.equals<br>',
                'knowledge'=>10,'gold'=>100,'time'=>30,'hint'=>'<p>Would num1 bigger than num2?</p>','photo'=>'./images/mcQuestion/ans15.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q16

            ['id'=>16,'name'=>'if_else 14', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>1
                ,'question'=>'What is the value of the "?" in the output? ','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
		int num = 43;
		if ( num < 0)
			num = 0;
		else
			num = num;
		System.out.println(num);
	}		
	
}</pre>',
                'question_ans'=>'b',
                'mc_ans1' =>'<br>0<br>',
                'mc_ans2' =>'<br>43<br>'
                ,'mc_ans3'=>'<br>num<br>'
                ,'mc_ans4'=>'<br>430<br>',
                'knowledge'=>10,'gold'=>100,'time'=>30,'hint'=>'<p>Is num bigger than 0?</p>','photo'=>'./images/mcQuestion/ans16.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],


            //Q17

            ['id'=>17,'name'=>'if_else 15', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>5
                ,'question'=>'What is the value of the "?" in the output? ','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
		int num = 43;
		if ( num > 0){
			if(num < 20)
			    System.out.println(num);
			else{
			    num = num - 20;
			    System.out.println(num);
			}
		}else
			num = num;
		System.out.println(num);
	}		
	
}</pre>',
                'question_ans'=>'b',
                'mc_ans1' =>'<br>23<br>',
                'mc_ans2' =>'<br>23<br>23<br>'
                ,'mc_ans3'=>'<br>43<br>'
                ,'mc_ans4'=>'<br>43<br>43<br>',
                'knowledge'=>50,'gold'=>350,'time'=>180,'hint'=>'<p>Is num bigger than 0?</p><p>How many times it need to output?</p>','photo'=>'./images/mcQuestion/ans17.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],


            //Q18

            ['id'=>18,'name'=>'if_else 16', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>5
                ,'question'=>'What is the value of the "?" in the output? ','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
		int num = 43;
		if ( num > 0){
			if(num < 20)
			    System.out.println(num);
			else if (num > 30){
			    num += 100;
			    System.out.println(num);
			}else{
			    num -= 10;
			    System.out.println(num);
			}
		}else{
		    System.out.println(num);
		}
	}		
	
}</pre>',
                'question_ans'=>'b',
                'mc_ans1' =>'<br>23<br>',
                'mc_ans2' =>'<br>143<br>'
                ,'mc_ans3'=>'<br>33<br>'
                ,'mc_ans4'=>'<br>20<br>',
                'knowledge'=>50,'gold'=>350,'time'=>180,'hint'=>'<p>Is num bigger than 0?</p><p>Does num fit in the next if_else statment?</p>','photo'=>'./images/mcQuestion/ans18.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q19

            ['id'=>19,'name'=>'if_else 17', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>5
                ,'question'=>'What is the value of the "?" in the output? ','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
		int num = 20;
		if ( num > 0){
			if(num < 20)
			    System.out.println(num);
			else if (num > 30){
			    num += 100;
			    System.out.println(num);
			}else{
			    num -= 10;
			    System.out.println(num);
			}
		}else{
		    System.out.println(num);
		}
	}		
	
}</pre>',
                'question_ans'=>'b',
                'mc_ans1' =>'<br>20<br>',
                'mc_ans2' =>'<br>10<br>'
                ,'mc_ans3'=>'<br>120<br>'
                ,'mc_ans4'=>'<br>30<br>',
                'knowledge'=>50,'gold'=>350,'time'=>180,'hint'=>'<p>Is num bigger than 0?</p><p>Does num fit in the next if_else statment?</p>','photo'=>'./images/mcQuestion/ans18.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],


            //Q20

            ['id'=>20,'name'=>'if_else 18', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>4
                ,'question'=>'What is the value of the "?" in the output? ','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
		int num = 20;
		if ( num > 0)
			if(num < 20)
			    System.out.println(num);
		else
		    System.out.println(-num);
	}		
	
}</pre>',
                'question_ans'=>'c',
                'mc_ans1' =>'<br>20<br>',
                'mc_ans2' =>'<br>0<br>'
                ,'mc_ans3'=>'<br>-20<br>'
                ,'mc_ans4'=>'<br>Output null<br>',
                'knowledge'=>30,'gold'=>200,'time'=>120,'hint'=>'<p>Is num bigger than 0?</p><p>Does num fit in the next if_else statment?</p>','photo'=>'./images/mcQuestion/ans20.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q21

            ['id'=>21,'name'=>'if_else 19', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>2
                ,'question'=>'What is the correct answer to make the output like below? The output is shown as below:','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
		int num = 645;
		if ( num > 0){
			if(num < 20)
			    System.out.println(num);
		System.out.println(num<input type="text" name="ans1" disabled >);
		}else
		    System.out.println(-num);
	}		
	
}</pre>',
                'question_ans'=>'b',
                'mc_ans1' =>'<br>/2<br>',
                'mc_ans2' =>'<br>-30<br>'
                ,'mc_ans3'=>'<br>-num<br>'
                ,'mc_ans4'=>'<br>-num/2<br>',
                'knowledge'=>20,'gold'=>120,'time'=>60,'hint'=>'<p>Is num bigger than 0?</p><p>Does num fit in the next if_else statment?</p>','photo'=>'./images/mcQuestion/ans21.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q22

            ['id'=>22,'name'=>'if_else 20', 'teacher_id'=>1, 'question_type'=>'if_else','question_level'=>2
                ,'question'=>'What is the correct answer to make the output like below? The output is shown as below:','program'=>

                '<pre>import java.util.*;

	public class test{

	public static void main (String [] args){
		int num = 645;
		if ( num > 0){
			if(num < 20)
			    System.out.println(num);
			else
			    System.out.println(num + 1000);
		System.out.println(num-100);
		}else
		    System.out.println(-num);
	}		
	
}</pre>',
                'question_ans'=>'c',
                'mc_ans1' =>'<br>645<br>',
                'mc_ans2' =>'<br>1645<br>'
                ,'mc_ans3'=>'<br>1645<br>545<br>'
                ,'mc_ans4'=>'<br>-645<br>',
                'knowledge'=>20,'gold'=>120,'time'=>60,'hint'=>'<p>Is num bigger than 0?</p><p>Does num fit in the next if_else statment?</p>','photo'=>'./images/mcQuestion/ans22.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q23

            ['id'=>23,'name'=>'array 1', 'teacher_id'=>1, 'question_type'=>'array','question_level'=>1
                ,'question'=>'What is the correct answer to make the output like below? The output is shown as below:','program'=>

                '<pre>		
	public class test{

	public static void main (String [] args){
		int gasPrices[] = new int[10];

		gasPrices[0] = 346;
		gasPrices[1] = 360;
		gasPrices[2] = 354;
		gasPrices[3] = 321;
	    System.out.println(<input type="text" name="ans1" disabled >);
	}
}</pre>',
                'question_ans'=>'c',
                'mc_ans1' =>'<br>gasPrices[2]<br>',
                'mc_ans2' =>'<br>gasPrices[3]<br>'
                ,'mc_ans3'=>'<br>gasPrices[0]<br>'
                ,'mc_ans4'=>'<br>gasPrices[1]<br>',
                'knowledge'=>20,'gold'=>120,'time'=>60,'hint'=>'<p>What is the array locate?</p>','photo'=>'./images/mcQuestion/ans23.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q24

            ['id'=>24,'name'=>'array 2', 'teacher_id'=>1, 'question_type'=>'array','question_level'=>1
                ,'question'=>'What is the correct answer to make the output like below? The output is shown as below:','program'=>

                '<pre>		
	public class test{

	public static void main (String [] args){
		int gasPrices[] = new int[10];

		gasPrices[0] = 856;
		gasPrices[1] = 765;
		gasPrices[2] = 454;
		gasPrices[3] = gasPrices[<input type="text" name="ans1" disabled >] - 100;
	    System.out.println(gasPrices[3]);
	}
}</pre>',
                'question_ans'=>'d',
                'mc_ans1' =>'<br>gasPrices[2]<br>',
                'mc_ans2' =>'<br>gasPrices[3]<br>'
                ,'mc_ans3'=>'<br>gasPrices[0]<br>'
                ,'mc_ans4'=>'<br>gasPrices[1]<br>',
                'knowledge'=>20,'gold'=>120,'time'=>60,'hint'=>'<p>what number subtract 100 can be the answer</p>','photo'=>'./images/mcQuestion/ans24.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q25

            ['id'=>25,'name'=>'array 3', 'teacher_id'=>1, 'question_type'=>'array','question_level'=>2
                ,'question'=>'What is the correct answer to make the output like below? The output is shown as below:','program'=>

                '<pre>		
	public class test{

	public static void main (String [] args){
	    int k = 3;
		int gasPrices[] = new int[k];

		gasPrices[0] = 15;
		gasPrices[1] = 32;
		gasPrices[2] = 76;
	    System.out.println(gasPrices<input type="text" name="ans1" disabled >);
	}
}</pre>',
                'question_ans'=>'b',
                'mc_ans1' =>'<br>.length()<br>',
                'mc_ans2' =>'<br>.length<br>'
                ,'mc_ans3'=>'<br>[3]<br>'
                ,'mc_ans4'=>'<br>[1]<br>',
                'knowledge'=>20,'gold'=>120,'time'=>60,'hint'=>'<p>How long is the array?</p><p>Do .length have "()" ?</p>','photo'=>'./images/mcQuestion/ans25.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q26

            ['id'=>26,'name'=>'loop 1', 'teacher_id'=>1, 'question_type'=>'loop','question_level'=>1
                ,'question'=>'What is the correct answer to make the output like below? The output is shown as below:','program'=>

                '<pre>		
	public class test{

	public static void main (String [] args){
	    int x = 1;
		while(x < <input type="text" name="ans1" disabled >){ 
		  System.out.println(x+"\t");
		  ++x;
		}
	}
}</pre>',
                'question_ans'=>'b',
                'mc_ans1' =>'<br>9<br>',
                'mc_ans2' =>'<br>10<br>'
                ,'mc_ans3'=>'<br>11<br>'
                ,'mc_ans4'=>'<br>8<br>',
                'knowledge'=>20,'gold'=>120,'time'=>60,'hint'=>'<p>How many times it will loop?</p>','photo'=>'./images/mcQuestion/ans26.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

            //Q27

            ['id'=>27,'name'=>'loop 2', 'teacher_id'=>1, 'question_type'=>'loop','question_level'=>1
                ,'question'=>'What is the correct answer to make the output like below? The output is shown as below:','program'=>

                '<pre>		
	public class test{

	public static void main (String [] args){
		int i,j;
		for<input type="text" name="ans1" disabled >{
			for<input type="text" name="ans2" disabled >{
				System.out.print("*");
			}
			System.out.println(" ");
		}
	}
}</pre>',
                'question_ans'=>'a',
                'mc_ans1'=>'<br>(i = 1; i < 10; i+=2)<br>(j = 0; j < i; j++)<br>',
                'mc_ans2' =>'<br>(i = 1; i < 10; i+=1)<br>(j = 1; j < i; j++)<br>'
                ,'mc_ans3'=>'<br>(i = 2; i < 10; i+=2)<br>(j = 0; j < i; j--)<br>'
                ,'mc_ans4'=>'<br>(i = 1; i <= 10; i+=2)<br>(j = 0; j <= i; j++)<br>',
                'knowledge'=>20,'gold'=>120,'time'=>60,'hint'=>'<p>First time print one *, second time orint two *</p>','photo'=>'./images/mcQuestion/ans26.JPG','created_at'=>new DateTime,'updated_at'=>new DateTime, 'slug'=> str_random(10)],

        );

        DB::table('mcQuestions')->insert($mcquestions);
    }
}
