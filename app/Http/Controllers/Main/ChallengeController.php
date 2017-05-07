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
        $totalgold = 0;
        $totalknowledge = 0;
        $totalquestion2 = count($fill) + count($mc);//all mc+fill question
        Session::forget('challenge');
        Session::forget('challengeFill');
        Session::forget('ChallengeRandom');
        Session::forget('ChallengeFillRandom');
        Session::push('ChallengeRandom',$random);
        $random = Session::get('ChallengeRandom')[0][$playNumber];
        return view('main.challenge.challengemode',compact('totalgold', 'totalknowledge','playNumber','mc','totalquestion2','random'));
    }
    public function challenge (Request $request)
    {
        $playNumber = $request->input('question_num')+1;
        $mc = DB::table('mcQuestions')->where('status',1)->get();


        if (Input::get('next')) {
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
                $totalgold = $totalgold + $gold;
                $totalknowledge = $totalknowledge + $knowledge;
                $totalquestiondetail[$playNumber] = ['Question' => $playNumber+1, 'Result' => 'True', 'Gold' => $gold, 'Knowledge' => $knowledge, 'Finish Time' => $UserTime];
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
                $totalgold = $totalgold + $gold;
                $totalquestiondetail[$playNumber] = ['Question' => $playNumber+1, 'Result' => 'False', 'Gold' => $gold, 'Knowledge' => $knowledge, 'Finish Time' => $UserTime];
                Session::push('challenge', $totalquestiondetail);
                $playNumber++;
                if($this->checkEnd($playNumber)) {
                    return view ($this->goPage());
                }
                $random = Session::get('ChallengeRandom')[0][$playNumber];
                return view('main.challenge.challengemode', compact('mc', 'totalgold', 'totalknowledge', 'playNumber','random'));
            }



//            else{
//                $gold = 0;
//                $knowledge = 0;
//                $totalgold = $request->input('totalgold');
//                $totalknowledge = $request->input('totalknowledge');
//                $totalgold += $gold;
//                $totalknowledge += $knowledge;
//                $playNumber = $request->input('question_num')-1;
//                $totalquestiondetail[$playNumber -1]=['Question' => 3 ,'Result' => 'False','Gold' =>$gold,'Knowledge'=>$knowledge,'Finish Time' =>$UserTime];
//                Session::push('challenge',$totalquestiondetail);
//            }

        }
        if(Input::get('skip')){
            $playAns = 'skip';
            $gold = 0;
            $knowledge = 0;
            $totalgold = $request->input('totalgold');
            $totalknowledge = $request->input('totalknowledge');
            $totalgold += $gold;
            $totalknowledge += $knowledge;
            $playNumber = $request->input('question_num');
            $random = Session::get('ChallengeRandom')[0][$playNumber];
            $totalquestiondetail[$playNumber]=['Question' => $playNumber+1 ,'Result' => '<i>skip</i>','Gold' =>$gold,'Knowledge'=>$knowledge,'Finish Time' =>0];
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
        if ($playNumber == count($mc)) {
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
//       return "abc";
        $mc = DB::table('mcQuestions')->where('status',1)->get();
        $mcquestion = $mc[1];
        //dd($mc[1]);
        return response()->json($mcquestion);
//        $semester = Input::get('sem');
//
//        return json_encode($semester);

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
        //dd($mc[1]);
        return response()->json($extra);
//        $semester = Input::get('sem');
//
//        return json_encode($semester);

    }
}
