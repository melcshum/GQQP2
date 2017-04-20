<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
