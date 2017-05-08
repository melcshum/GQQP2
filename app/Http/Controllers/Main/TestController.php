<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Main\Mcquestion;
use App\Fullquestion;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use Session;

//$mc = Mcquestion::all();
class TestController extends Controller
{
    private $mc;
    private $totalgold;
    public function __construct()
    {
        //$this->mc = McQuestion::all();
        $this->totalgold = 0;
    }

    public function index(Request $request){ //set all need infor
        //$totalquestion = [1,2,3,4,5];
        //$arrayList[0] = ['name' => 'Desk' ,'price' => 100];
        //$arrayList[1] = ['name' => 'Joe' ,'price' => 90];
        //dd($arrayList[0]['name']);
        //dd($this->fill);


    }

    public function result(Request $request){
        if(Input::get('1')) {
            $type = Input::get('1');
            $playQuestionNum = 0;
            //$mc = $this->mc;
            $mc = DB::table('mcquestions')->where('question_type', $type)->where('status',1)->get();
            $random = $this->randomNumber(count($mc));
            //dd($random);
            $totalgold = $this->totalgold;
            Session::forget('abc');//clear session abc
            Session::forget('random');
            Session::push('random',$random);
            $random = Session::get('random')[0][$playQuestionNum];
            //dd(Session::get('random')[0][0]);
            return view('main.game.gameTest1', compact('mc', 'playQuestionNum', 'totalgold','type','random'));
        }
        $type = Input::get('type');
        $mc = DB::table('mcquestions')->where('question_type', $type)->where('status',1)->get();
        $mc_num = count($mc);//count the all question
        $playQuestionNum = $request->input('question_num');
        if(Input::get('Next_question')){//view button in question result
            if(($playQuestionNum>=$mc_num)){//check game is not finish to 20
                $this->totalgold= $this->totalgold+$request->input('totalgold');//set the totalgold
                $totalgold = $this->totalgold;//set the totalgold
                $totalquestionresult = Session::get('abc');
                $this->update($totalgold);
                //dd(Session::get('abc')[0]);
                return $this->finish( $totalgold, $totalquestionresult);//end
            }
        $playQuestionNum = $request->input('question_num');//get the number of now do question number
        $this->totalgold= $this->totalgold+$request->input('totalgold');//set the totalgold
        $totalgold = $this->totalgold;//set the totalgold
        $mc = DB::table('mcquestions')->where('question_type', $type)->where('status',1)->get();
            $random = Session::get('random')[0][$playQuestionNum];
            $type = Input::get('type');
        return view('main.game.gameTest1',compact('mc','playQuestionNum','totalgold','random','type'));
        }

        $mc = DB::table('mcquestions')->where('question_type', $type)->where('status',1)->get();
        //dd(Auth::user()->id);

        $time = $request->input('time');
        $playQuestionNum = $request->input('question_num')-1;//which questionNum
        $random = Session::get('random')[0][$playQuestionNum];
        $tureAns = $this->getDbAns(($mc[$random]->question_ans), $random,$type);//the mc ans
        if (Input::get('skip')) {//if user click skip button
            $this->totalgold= $this->totalgold+$request->input('totalgold');//set the totalgold
            $totalgold = $this->totalgold;//set the totalgold
            $playAns = '';//player choose ans
            $ans = "You have skip this question";
            $gold = 0;
            $time = 0;
            $type = Input::get('type');
            $random = Session::get('random')[0][$playQuestionNum];
            $totalquestiondetail[$playQuestionNum]=['Question' => $playQuestionNum+1 ,'Result' => '<font color="orange">Skip</font>','Gold' =>$gold,'Finish Time' =>$time];
            Session::push('abc',$totalquestiondetail);
            $message = '<font color="Orange">You have skip this question!</font>';
            $gif='<img src="./images/skip.gif" width="100%" height="100%">';

            return view('main.game.gameResult', compact('playAns', 'playQuestionNum', 'mc', 'ans', 'tureAns', 'gold','time','totalgold','type','random','message','gif'));

        } elseif (Input::get('next')) { // if user choose answer the question and click next
            //dd(Session::get('random')[0][$playQuestionNum]);
            $playAns = $request->input('ans');//player choose ans
            $this->totalgold= $this->totalgold+$request->input('totalgold');//set the totalgold
            $totalgold = $this->totalgold;//set the totalgold
            if ($playAns == $mc[$random]->question_ans) {
                $gold = ($mc[$random]->gold);
                $totalquestiondetail[$playQuestionNum]=['Question' => $playQuestionNum+1 ,'Result' => '<font color="#76eec6">Correct</font>','Gold' =>$gold,'Finish Time' =>$time];
                Session::push('abc',$totalquestiondetail);
                $message = '<font color="#008000">Nice, You are Correct</font>';
                $gif='<img src="./images/correct.gif" width="100%" height="100%">';
            } else {
                $gold = 0;
                $totalquestiondetail[$playQuestionNum]=['Question' => $playQuestionNum+1 ,'Result' => '<font color ="#ee3b3b">Incorrect</font>','Gold' =>$gold,'Finish Time' =>$time];
                Session::push('abc',$totalquestiondetail);
                $message = '<font color="#ee3b3b">Sorry, You are Incorrect</font>';
                $gif='<img src="./images/wrong.gif" width="100%" height="100%">';
            }
            if ($playAns == 'a') {
                $type = Input::get('type');
                $random = Session::get('random')[0][$playQuestionNum];
                $ans = ($mc[$random]->mc_ans1);
                return view('main.game.gameResult', compact('playAns', 'playQuestionNum', 'mc', 'ans', 'tureAns', 'gold','time','totalgold','random','type','message','gif'));
            } elseif ($playAns == 'b') {
                $type = Input::get('type');
                $random = Session::get('random')[0][$playQuestionNum];
                $ans = ($mc[$random]->mc_ans2);
                return view('main.game.gameResult', compact('playAns', 'playQuestionNum', 'mc', 'ans', 'tureAns', 'gold','time','totalgold', 'random','type','message','gif'));
            } elseif ($playAns == 'c') {
                $type = Input::get('type');
                $random = Session::get('random')[0][$playQuestionNum];
                $ans = ($mc[$random]->mc_ans3);
                return view('main.game.gameResult', compact('playAns', 'playQuestionNum', 'mc', 'ans', 'tureAns', 'gold','time','totalgold','random','type','message','gif'));
            } elseif ($playAns == 'd') {
                $type = Input::get('type');
                $random = Session::get('random')[0][$playQuestionNum];
                $ans = ($mc[$random]->mc_ans4);
                return view('main.game.gameResult', compact('playAns', 'playQuestionNum', 'mc', 'ans', 'tureAns', 'gold','time','totalgold','random','type','message','gif'));
            }
            //if(Input::get('ship')) {
            //    return "Yes";
            //}else{
            //    return "No";
            //    }

            //if($mc[$playQuestionNum-1]['attributes']['question_ans']==$playAns){
            //    return "nice";
            //}else{
            //    return "no";
            //}
            //dd(($mc[$playQuestionNum-1]['attributes']['question_ans']));
            //dd($playQuestionNum);
        }
    }

    public function getDbAns($answer,$num,$type){
        $mc = DB::table('mcquestions')->where('question_type', $type)->where('status',1)->get();
        if($answer=='a'){
            $qAns=($mc[$num]->mc_ans1);
        }elseif ($answer=='b'){
            $qAns=($mc[$num]->mc_ans2);
        }elseif($answer=='c'){
            $qAns=($mc[$num]->mc_ans3);
        }elseif($answer=='d'){
            $qAns=($mc[$num]->mc_ans4);
        }
        return $qAns;
    }

    public function finish($totalgold, $totalquestionresult){
        //dd($totalquestionresult);
        //for($i=0;$i<count($totalquestionresult);$i++){
         //   if($totalquestionresult[$i][$i]['Result']=='skip'){
         //       //$table+="asd";
        //    }
            //$table+="</tr>";
        //}
       // return $totalquestionresult;
        //dd(Auth::user()->id);
        $totaltime=0;
        for($i=0;$i<count($totalquestionresult);$i++){
            $totaltime+=$totalquestionresult[$i][$i]['Finish Time'];
        }
        return view ('main.game.Result', compact('totalquestionresult','totalgold','totaltime'));
    }

    public function update($totalgold)
    {
        $gold = Auth::user()->gold + $totalgold;
        DB::table('users')
            ->where('id',Auth::user()->id)
           ->update(array('gold'=>$gold));
        //$project->update($input);
        return 'nice';
    }

    public function randomNumber($total){
        $random = range(0,$total-1);
        shuffle($random);
        return (array_slice($random, 0 ,$total));
    }
}
