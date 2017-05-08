<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Main\Fullquestion;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use Session;

class ChallengeFillController extends Controller
{
    public function index(){
        $fill = DB::table('fillQuestions')->where('status',1)->get();
        $playnum = 20;
        $totalgold = 0;
        $random = $this->randomNumber(count($fill));
        Session::push('ChallengeFillRandom',$random);
        $random = Session::get('ChallengeFillRandom')[0][0];
        $totalknowledge = 0;

        return view('main.challenge.challengefill',compact('totalgold', 'totalknowledge','playnum','fill','random'));
    }

    public function challenge(Request $request){
        $fill = DB::table('fillQuestions')->where('status',1)->get();
        $random = Session::get('ChallengeFillRandom')[0][0];
       //dd($fill[0]['attributes']['']);
        $playnum = $request->input('playNum');//20
        $ans1 =$request->input('ans1');
        $ans2 =$request->input('ans2');
        $ans3 =$request->input('ans3');
        $ans4 =$request->input('ans4');
        $ans5 =$request->input('ans5');
        $type = $fill[$random]->question_type;
        if($ans1==""||$ans1==""||$ans2==""||$ans3==""||$ans4==""||$ans5==""||Input::get('skip')){

            $totalquestiondetail[$playnum] = ['Question' => 20, 'Result' => '<font color ="#ee3b3b">Incorrect</font>', 'Gold' => 0, 'Knowledge' => 0, 'Finish Time' => 0, 'Type'=>$type];
            Session::push('challengeFill', $totalquestiondetail);
            $totalquestionresult = Session::get('challengeFill');
            $totalquestionMCresult = Session::get('challenge');
            $totalGold = $this->getTotalGold($totalquestionMCresult,$totalquestionresult);
            $totalTime = $this->getTotalTime($totalquestionMCresult,$totalquestionresult);
            $totalKnow = $this->getTotalKnow($totalquestionMCresult,$totalquestionresult);
            $this->update($totalGold,$totalKnow);
            //dd($totalquestionresult);
            return view ('main.challenge.ChallengeResult', compact('totalquestionresult','totalquestionMCresult','totalTime','totalGold','totalKnow'));
        }
        $fill = DB::table('fillQuestions')->where('status',1)->get();
        $random = Session::get('ChallengeFillRandom')[0][0];
        $gold = $fill[$random]->gold;
        $knowledge = $fill[$random]->knowledge;
       // dd($playnum);
        $check = $this->checkAns($ans1,$ans2,$ans3,$ans4,$ans5,$random);
        $totalquestiondetail[$playnum] = ['Question' => 20, 'Result' => '<font color="#76eec6">Correct</font>', 'Gold' => 0, 'Knowledge' => 0, 'Finish Time' => 0,'Type'=>$type];
        Session::push('challengeFill', $totalquestiondetail);
        $totalquestionresult = Session::get('challengeFill');
        $totalquestionMCresult = Session::get('challenge');
        $totalGold = $this->getTotalGold($totalquestionMCresult,$totalquestionresult);
        $totalTime = $this->getTotalTime($totalquestionMCresult,$totalquestionresult);
        $totalKnow = $this->getTotalKnow($totalquestionMCresult,$totalquestionresult);
        $this->update($totalGold,$totalKnow);
        $this->updateSkill();
        return view ('main.challenge.ChallengeResult', compact('totalquestionresult','totalquestionMCresult','totalGold','totalTime','totalKnow'));
    }
    public function checkAns($ans1,$ans2,$ans3,$ans4,$ans5,$random){
        $fill = DB::table('fillQuestions')->where('status',1)->get();
        $check = true;
        if($fill[$random]->ans1 != $ans1){
            $check = false;
            return $check;
        }else if($fill[$random]->ans2 != $ans2){
            $check = false;
            return $check;
        }else if($fill[$random]->ans3 != $ans3){
            $check = false;
            return $check;
        }else if($fill[$random]->ans4 != $ans4){
            $check = false;
            return $check;
        }else if($fill[$random]->ans5 != $ans5){
            $check = false;
            return $check;
        }
        return true;
    }
    public function randomNumber($total){
        $random = range(0,$total-1);
        shuffle($random);
        return (array_slice($random, 0 ,$total));
    }

    public function getTotalGold($totalquestionMCresult,$totalquestionresult){
        $gold = 0;
        for($i = 0;$i<count($totalquestionMCresult);$i++){
            $gold +=$totalquestionMCresult[$i][$i]['Gold'];
        }
        $gold+=$totalquestionresult[0][0]['Gold'];
        return $gold;
    }

    public function getTotalTime($totalquestionMCresult,$totalquestionresult){
        $time = 0;
        for($i = 0;$i<count($totalquestionMCresult);$i++){
            $time +=$totalquestionMCresult[$i][$i]['Finish Time'];
        }
        $time+=$totalquestionresult[0][0]['Finish Time'];
        return $time;
    }

    public function getTotalKnow($totalquestionMCresult,$totalquestionresult){
        $know = 0;
        for($i = 0;$i<count($totalquestionMCresult);$i++){
            $know +=$totalquestionMCresult[$i][$i]['Knowledge'];
        }
        $know+=$totalquestionresult[0][0]['Knowledge'];
        return $know;
    }

    public function update($totalgold,$totalKnow)
    {
        $gold = Auth::user()->gold + $totalgold;
        DB::table('users')
            ->where('id',Auth::user()->id)
            ->update(array('gold'=>$gold));

        $know = Auth::user()->Knowledge + $totalKnow;
        DB::table('users')
            ->where('id',Auth::user()->id)
            ->update(array('Knowledge'=>$know));
        //$project->update($input);
        return 'nice';
    }

    public function updateSkill()
    {
        //challenge
        //challengeFill
        $mcType = Session::get('challenge');
        $fillType = Session::get('challengeFill');
        $UserInfo = DB::table('skills')->where('user_id',Auth::user()->id)->get();
        $ifskillPoint = $UserInfo[0]->if_else_point;
        $arrayskillPoint = $UserInfo[0]->array_point;
        $loopskillPoint = $UserInfo[0]->loop_point;
        //dd($ifskillPoint);
        for($i=0;$i<count($mcType);$i++){
            if($mcType[$i][$i]['Type'] =='if_else'){
                $ifskillPoint = $ifskillPoint + $mcType[$i][$i]['Knowledge'];
            }
            if($mcType[$i][$i]['Type'] =='array'){
                $arrayskillPoint = $arrayskillPoint + $mcType[$i][$i]['Knowledge'];
            }
            if($mcType[$i][$i]['Type'] =='loop'){
                $loopskillPoint = $loopskillPoint + $mcType[$i][$i]['Knowledge'];
            }
        }
        $ifskillLv = $UserInfo[0]->if_else_level;
        $arrayskillLv = $UserInfo[0]->array_level;
        $loopskillLv = $UserInfo[0]->loop_level;

        if($fillType[0][0]['Type']== 'if_else'){
            $ifskillPoint = $ifskillPoint + $mcType[0][0]['Knowledge'];
        }
        if($fillType[0][0]['Type']== 'array'){
            $arrayskillPoint = $arrayskillPoint + $mcType[0][0]['Knowledge'];
        }
        if($fillType[0][0]['Type']== 'loop'){
            $loopskillPoint = $loopskillPoint + $mcType[0][0]['Knowledge'];
        }


        DB::table('skills')
            ->where('user_id',Auth::user()->id)
            ->update(array('if_else_point'=>$ifskillPoint,'array_point'=>$arrayskillPoint,'loop_point'=>$loopskillPoint
            ,'if_else_level'=>$ifskillLv+($ifskillPoint/630),'loop_level'=>$loopskillLv+($loopskillPoint/630),'array_level'=>$arrayskillLv+($arrayskillPoint/630)));
        //dd($ifskillPoint);
        //dd($mcType[0][0]['Type']);




        //dd($fillType[0][0]['Type']);
        //dd($type);
//        $gold = Auth::user()->gold + $totalgold;
//        DB::table('users')
//            ->where('id',Auth::user()->id)
//            ->update(array('gold'=>$gold));
//        //$project->update($input);
    }



}
