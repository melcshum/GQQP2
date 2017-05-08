<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Main\Mcquestion;
use App\Models\Main\Fullquestion;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use Session;

class ChallengeController extends Controller
{
    public function index(){
        $playNumber = 0;
        $mc = DB::table('mcQuestions')->where('status',1)->get();
        $random = $this->randomNumber(count($mc));
        $fill = DB::table('fillQuestions')->where('status',1)->get();//
        $changeNumber = 20;
        $totalgold = 0;
        $totalknowledge = 0;
        $totalquestion2 = count($fill) + count($mc);//all mc+fill question
        Session::forget('challenge');
        Session::forget('challengeFill');
        Session::forget('ChangeNumber');
        Session::forget('ChallengeRandom');
        Session::forget('ChallengeFillRandom');
        Session::push('ChallengeRandom',$random);
        Session::push('ChangeNumber',$changeNumber);
        $random = Session::get('ChallengeRandom')[0][$playNumber];
        return view('main.challenge.challengemode',compact('totalgold', 'totalknowledge','playNumber','mc','totalquestion2','random'));
    }
    public function challenge (Request $request)
    {
        $playNumber = $request->input('question_num')+1;
        $mc = DB::table('mcQuestions')->where('status',1)->get();


        if (Input::get('next') && $request->input('time') !=0) {
            $mc = DB::table('mcQuestions')->where('status',1)->get();//get MCquestion database
            $UserTime = $request->input('qtime');//User finish Time
            $QuestionTime = $request->input('time');//Question finish Time
            $totalgold = $request->input('totalgold');//get the totalgold in all Challenge
            $totalknowledge = $request->input('totalknowledge');//get the totalknowledge in all Challenge
            $playNumber = $request->input('question_num');//get now finish question no.
            $random = Session::get('ChallengeRandom')[0][$playNumber];
            $playAns = $request->input('ans');//get User play Ans
            $trueAns = $request->input('trueAns');
            if ($this->checkTureFlase($playAns, $trueAns)) {
                $gold = ($mc[$random]->gold);
                $knowledge = ($mc[$random]->knowledge);
                $type = ($mc[$random]->question_type);
                $totalgold = $totalgold + $gold;
                $totalknowledge = $totalknowledge + $knowledge;
                $totalquestiondetail[$playNumber] = ['Question' => $playNumber+1, 'Result' => '<font color="#76eec6">Correct</font>', 'Gold' => $gold, 'Knowledge' => $knowledge, 'Finish Time' => $QuestionTime,'Type' => $type];
                Session::push('challenge', $totalquestiondetail);
                $playNumber++;
                if($this->checkEnd($playNumber)) {
                    return view ($this->goPage());
                }
                $random = Session::get('ChallengeRandom')[0][$playNumber];
                return view('main.challenge.challengemode', compact('mc', 'totalgold', 'totalknowledge', 'playNumber','random'));

            }else{
                $random = Session::get('ChallengeRandom')[0][$playNumber];
                $gold = 0;
                $knowledge = 0;
                $type = ($mc[$random]->question_type);
                $totalgold = $totalgold + $gold;
                $totalquestiondetail[$playNumber] = ['Question' => $playNumber+1, 'Result' => '<font color ="#ee3b3b">Incorrect</font>', 'Gold' => $gold, 'Knowledge' => $knowledge, 'Finish Time' => $QuestionTime, 'Type' => $type];
                Session::push('challenge', $totalquestiondetail);
                $playNumber++;
                if($this->checkEnd($playNumber)) {
                    return view ($this->goPage());
                }
                $random = Session::get('ChallengeRandom')[0][$playNumber];
                return view('main.challenge.challengemode', compact('mc', 'totalgold', 'totalknowledge', 'playNumber','random'));
            }



        }
        else{
            $playAns = 'Time Up';
            $gold = 0;
            $knowledge = 0;
            $totalgold = $request->input('totalgold');
            $totalknowledge = $request->input('totalknowledge');
            $totalgold += $gold;
            $totalknowledge += $knowledge;
            $playNumber = $request->input('question_num');
            $random = Session::get('ChallengeRandom')[0][$playNumber];
            $totalquestiondetail[$playNumber]=['Question' => $playNumber+1 ,'Result' => '<i>Time Up</i>','Gold' =>$gold,'Knowledge'=>$knowledge,'Finish Time' =>0];
            Session::push('challenge',$totalquestiondetail);
            $playNumber++;
            if($this->checkEnd($playNumber)) {
                return view ($this->goPage());
            }
            $random = Session::get('ChallengeRandom')[0][$playNumber];
            return view('main.challenge.challengemode', compact('mc', 'totalgold', 'totalknowledge', 'playNumber','random'));
        }




    }

    public function checkTureFlase($playAns, $trueAns){
        $bool = "";
        if($playAns==$trueAns){
            $bool = True;
        }else{
            $bool = False;
        }
        return $bool;
    }
    public function checkEnd($playNumber){
        $End = "";
        $mc =DB::table('mcQuestions')->where('status',1)->get();
        if ($playNumber == 1) { // to 20
            $End = True;
        }else {
            $End = False;
        }
//
        return $End;
        }

    public function goPage(){
        return ("main.challenge.gotoFill");
    }

    public function checkAjax(Request $request){
        $changeNumber = Session::get('ChangeNumber');
        $random = Session::get('ChallengeRandom');
        $nowPlayNum =  (input::get('sem'));
        //dd($random);
        $random[0][$nowPlayNum] = $changeNumber[0];
        //dd($random);
        Session::forget('ChallengeRandom');
        Session::push('ChallengeRandom',$random[0]);
        $random = Session::get('ChallengeRandom');
        $mc =DB::table('mcQuestions')->where('status',1)->get();
        $change = Auth::user()->change -1;
        DB::table('users')
            ->where('id',Auth::user()->id)
            ->update(array('change'=>$change));
        Session::forget('ChangeNumber');
        Session::push('ChangeNumber',$changeNumber[0]+1);
        return response()->json( $mc[$random[0][$nowPlayNum]]);
    }

    public function randomNumber($total){
        $random = range(0,$total-1);
        shuffle($random);
        return (array_slice($random, 0 ,$total));
    }

    public function UpdateExtraNum(Request $request){
        $extra = Auth::user()->extra -1;
        DB::table('users')
            ->where('id',Auth::user()->id)
            ->update(array('extra'=>$extra));
        return response()->json($extra);
    }

    public function UpdateHalfNum(Request $request){
        $half = Auth::user()->half -1;
        DB::table('users')
            ->where('id',Auth::user()->id)
            ->update(array('half'=>$half));
        return response()->json($half);
    }
}
