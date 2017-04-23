<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use App\Models\Main\looptutquestions;

class LoopTutorialController extends Controller
{


    public function show(Request $request){
        //dd(Input::get('1'));  // do check number of question
        if(Input::get('next')){
            $playAns = $request->input('tutans');
            $playQuestionNum = $request->input('numQ');
            $looptutorial = looptutquestions::all();
            $message="";
            $tureAns = ($looptutorial[$playQuestionNum]['attributes']['question_ans']);
            $turntotAns = $this->getTureAns($tureAns,$looptutorial,$playQuestionNum);
            $userAns = $this->getTureAns($playAns,$looptutorial,$playQuestionNum);
            if($playAns==$tureAns){
                $message="NIce, you are correct";
            }else{
                $message="Sorry, you are not correct";
            }
            return view('main.tutorial.looptutResult', compact('message', 'tureAns','playQuestionNum','playAns','looptutorial','userAns','turntotAns'));
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
            $looptutorial = looptutquestions::all();
            //dd($fill);

            return view('main.tutorial.loopTutQuestionpage', compact('looptutorial', 'tutquestion'));
        }
    }

    public function getTureAns($playAns,$looptutorial,$playQuestionNum){
        $qAns="";
        if($playAns=='a'){
            $qAns =  $looptutorial[$playQuestionNum]['attributes']['mc_ans1'];
        }elseif($playAns=='b'){
            $qAns =  $looptutorial[$playQuestionNum]['attributes']['mc_ans2'];
        }elseif($playAns=='c'){
            $qAns =  $looptutorial[$playQuestionNum]['attributes']['mc_ans3'];
        }elseif($playAns=='d'){
            $qAns =  $looptutorial[$playQuestionNum]['attributes']['mc_ans4'];
        }
        return $qAns;
    }
}
