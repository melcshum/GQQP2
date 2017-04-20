<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use  App\Fullquestion;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use Session;

class ChallengeFillController extends Controller
{
    public function index(){
        $fill = Fullquestion::all();
        $playnum = 0;
        $totalgold = 0;
        $totalknowledge = 0;

        return view('challengefill',compact('totalgold', 'totalknowledge','playnum','fill'));
    }

    public function challenge(Request $request){
        $fill = Fullquestion::all();
       //dd($fill[0]['attributes']['']);
        $playnum = $request->input('playNum');
        $ans1 =$request->input('ans1');
        $ans2 =$request->input('ans2');
        $ans3 =$request->input('ans3');
        $ans4 =$request->input('ans4');
        $ans5 =$request->input('ans5');

        $totalgold = '0';
        $totaltime = '60';
        if($ans1==""||$ans1==""||$ans2==""||$ans3==""||$ans4==""||$ans5==""){
            $totalquestiondetail[$playnum+3] = ['Question' => $playnum + 3, 'Result' => 'True', 'Gold' => 0, 'Knowledge' => 0, 'Finish Time' => 0];
            //Session::push('challenge', $totalquestiondetail);
            $totalquestionresult = Session::get('challenge');
            //dd($totalquestionresult);
            return view ('ChallengeResult', compact('totalquestionresult','totalgold','totaltime'));
        }
       // dd($playnum);
        $check = $this->checkAns($ans1,$ans2,$ans3,$ans4,$ans5,$playnum);
        dd($check);
        //Session::push('challenge', $totalquestiondetail);
        return "asd";
    }
    public function checkAns($ans1,$ans2,$ans3,$ans4,$ans5,$playnum){
        $fill = Fullquestion::all();
        $check = true;
        if($fill[$playnum]['attributes']['asn1'] != $ans1){
            $check = false;
            return $check;
        }else if($fill[$playnum]['attributes']['asn2'] != $ans2){
            $check = false;
            return $check;
        }else if($fill[$playnum]['attributes']['asn3'] != $ans3){
            $check = false;
            return $check;
        }else if($fill[$playnum]['attributes']['asn4'] != $ans4){
            $check = false;
            return $check;
        }else if($fill[$playnum]['attributes']['asn5'] != $ans5){
            $check = false;
            return $check;
        }
        return true;
    }
}
