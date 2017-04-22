<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');;
    }

    public function index(){
        $question = DB::table('newQuestions') -> get();
        return view('question') -> with('data', $question);
    }

    public function search(){
        $search = '%'.$_POST['question_type'].'%';

        $users = DB::table('newQuestions')
            ->where('question_type' == $search)
        ->get();
    }
}
