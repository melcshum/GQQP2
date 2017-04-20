<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use App\iftutquestions;

class TutorialController extends Controller
{


    public function show(Request $request){
        if(Input::get('next')){
            $playAns = $request->input('tutans');
            $playQuestionNum = $request->input('numQ');
            $iftutorial = iftutquestions::all();
            $message="";
            $tureAns = ($iftutorial[$playQuestionNum]['attributes']['question_ans']);
            $turntotAns = $this->getTureAns($tureAns,$iftutorial,$playQuestionNum);
            $userAns = $this->getTureAns($playAns,$iftutorial,$playQuestionNum);
            if($playAns==$tureAns){
                $message="NIce, you are correct";
            }else{
                $message="Sorry, you are not correct";
            }
            return view('MctutorialResult', compact('message', 'tureAns','playQuestionNum','playAns','iftutorial','userAns','turntotAns'));
        }
        else {
            $tutquestion = 0;
            if (Input::get('1')) {
                $tutquestion = 0;
            } elseif (Input::get('2')) {
                $tutquestion = 1;
            } elseif(Input::get('3')){
                $tutquestion = 2;
            }
            //$fill = Fillquestion::all();
            $iftutorial = iftutquestions::all();
            //dd($fill);
            return view('tutMcQuestion', compact('iftutorial', 'tutquestion'));
        }
    }

    public function getTureAns($playAns,$iftutorial,$playQuestionNum){
        $qAns="";
        if($playAns=='a'){
            $qAns =  $iftutorial[$playQuestionNum]['attributes']['mc_ans1'];
        }elseif($playAns=='b'){
            $qAns =  $iftutorial[$playQuestionNum]['attributes']['mc_ans2'];
        }elseif($playAns=='c'){
            $qAns =  $iftutorial[$playQuestionNum]['attributes']['mc_ans3'];
        }elseif($playAns=='d'){
            $qAns =  $iftutorial[$playQuestionNum]['attributes']['mc_ans4'];
        }
        return $qAns;
    }
}
