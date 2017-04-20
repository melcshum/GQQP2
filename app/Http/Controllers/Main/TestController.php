<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mcquestion;
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
        $this->mc = McQuestion::all();
        $this->totalgold = 0;
    }

    public function index(){ //set all need infor
        //$totalquestion = [1,2,3,4,5];
        //$arrayList[0] = ['name' => 'Desk' ,'price' => 100];
        //$arrayList[1] = ['name' => 'Joe' ,'price' => 90];
        //dd($arrayList[0]['name']);
        //dd($this->fill);
        $playQuestionNum = 0;
        $mc = $this->mc;
        $totalgold = $this->totalgold;
        Session::forget('abc');//clear session abc
        return view('gameTest1', compact('mc','playQuestionNum','totalgold'));
    }

    public function result(Request $request){
        $mc = $this->mc;
        $mc_num = count($mc);//count the all question
        $playQuestionNum = $request->input('question_num');
        if(Input::get('Next_question')){//view button in question result
            if(($playQuestionNum>=$mc_num)){//check game is not finish
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
        $mc = $this->mc;
        //$questionResult = [['']];
        return view('gameTest1',compact('mc','playQuestionNum','totalgold'));
        }

        $mc = $this->mc;
        //dd(Auth::user()->id);
        $time = $request->input('time');
        $playQuestionNum = $request->input('question_num')-1;//which questionNum

        $tureAns = $this->getDbAns(($mc[$playQuestionNum]['attributes']['question_ans']), $playQuestionNum);//the mc ans
        if (Input::get('skip')) {//if user click skip button
            $this->totalgold= $this->totalgold+$request->input('totalgold');//set the totalgold
            $totalgold = $this->totalgold;//set the totalgold
            $playAns = 'Null';//player choose ans
            $ans = "you skip the question";
            $gold = 0;
            $time = 0;
            $totalquestiondetail[$playQuestionNum]=['Question' => $playQuestionNum+1 ,'Result' => '<i>skip</i>','Gold' =>$gold,'Finish Time' =>$time];
            Session::push('abc',$totalquestiondetail);
            return view('gameResult', compact('playAns', 'playQuestionNum', 'mc', 'ans', 'tureAns', 'gold','time','totalgold'));
        } elseif (Input::get('next')) { // if user choose answer the question and click next
            $playAns = $request->input('ans');//player choose ans
            $this->totalgold= $this->totalgold+$request->input('totalgold');//set the totalgold
            $totalgold = $this->totalgold;//set the totalgold
            if ($playAns == $mc[$playQuestionNum]['attributes']['question_ans']) {
                $gold = ($mc[$playQuestionNum]['attributes']['gold']);
                $totalquestiondetail[$playQuestionNum]=['Question' => $playQuestionNum+1 ,'Result' => 'Ture','Gold' =>$gold,'Finish Time' =>$time];
                Session::push('abc',$totalquestiondetail);
            } else {
                $gold = 0;
                $totalquestiondetail[$playQuestionNum]=['Question' => $playQuestionNum+1 ,'Result' => 'False','Gold' =>$gold,'Finish Time' =>$time];
                Session::push('abc',$totalquestiondetail);
            }
            if ($playAns == 'a') {
                $ans = ($mc[$playQuestionNum]['attributes']['mc_ans1']);
                return view('gameResult', compact('playAns', 'playQuestionNum', 'mc', 'ans', 'tureAns', 'gold','time','totalgold'));
            } elseif ($playAns == 'b') {
                $ans = ($mc[$playQuestionNum]['attributes']['mc_ans2']);
                return view('gameResult', compact('playAns', 'playQuestionNum', 'mc', 'ans', 'tureAns', 'gold','time','totalgold'));
            } elseif ($playAns == 'c') {
                $ans = ($mc[$playQuestionNum]['attributes']['mc_ans3']);
                return view('gameResult', compact('playAns', 'playQuestionNum', 'mc', 'ans', 'tureAns', 'gold','time','totalgold'));
            } elseif ($playAns == 'd') {
                $ans = ($mc[$playQuestionNum]['attributes']['mc_ans4']);
                return view('gameResult', compact('playAns', 'playQuestionNum', 'mc', 'ans', 'tureAns', 'gold','time','totalgold'));
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

    public function getDbAns($answer,$num){
        $mc = $this->mc;
        if($answer=='a'){
            $qAns=($mc[$num]['attributes']['mc_ans1']);
        }elseif ($answer=='b'){
            $qAns=($mc[$num]['attributes']['mc_ans2']);
        }elseif($answer=='c'){
            $qAns=($mc[$num]['attributes']['mc_ans3']);
        }elseif($answer=='d'){
            $qAns=($mc[$num]['attributes']['mc_ans4']);
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
        return view ('Result', compact('totalquestionresult','totalgold','totaltime'));
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
}
