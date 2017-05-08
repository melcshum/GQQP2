<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use App\Models\Main\arraytutquestions;

class ArrayTutorialController extends Controller
{


    public function show(Request $request){
        //dd(Input::get('1'));  // do check number of question
        if(Input::get('next')){
            $playAns = $request->input('tutans');
            $playQuestionNum = $request->input('numQ');
            $arraytutorial = arraytutquestions::all();
            $message="";
            $tureAns = ($arraytutorial[$playQuestionNum]['attributes']['question_ans']);
            $turntotAns = $this->getTureAns($tureAns,$arraytutorial,$playQuestionNum);
            $userAns = $this->getTureAns($playAns,$arraytutorial,$playQuestionNum);
            if($playAns==$tureAns){
                $message="<font color=\"#008000\">Nice, You are Correct</font>";
            }else{
                $message="<font color=\"#ee3b3b\">Sorry, You are Incorrect</font>";
            }
            return view('main.tutorial.arraytutResult', compact('message', 'tureAns','playQuestionNum','playAns','arraytutorial','userAns','turntotAns'));
        }
        else {
            //dd(Input::get('1'));
            $tutquestion = 0;
            if (Input::get('1')) {
                $tutquestion = 0;
            } elseif (Input::get('2')) {
                $tutquestion = 1;
            } elseif(Input::get('3')){
                $tutquestion = 2;
            }
            //$fill = Fillquestion::all();
            $arraytutorial = arraytutquestions::all();
            //dd($fill);
            return view('main.tutorial.arrayTutQuestionpage', compact('arraytutorial', 'tutquestion'));
        }
    }

    public function getTureAns($playAns,$arraytutorial,$playQuestionNum){
        $qAns="";
        if($playAns=='a'){
            $qAns =  $arraytutorial[$playQuestionNum]['attributes']['mc_ans1'];
        }elseif($playAns=='b'){
            $qAns =  $arraytutorial[$playQuestionNum]['attributes']['mc_ans2'];
        }elseif($playAns=='c'){
            $qAns =  $arraytutorial[$playQuestionNum]['attributes']['mc_ans3'];
        }elseif($playAns=='d'){
            $qAns =  $arraytutorial[$playQuestionNum]['attributes']['mc_ans4'];
        }
        return $qAns;
    }
}
