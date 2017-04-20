<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Hash;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;
use DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($id){

    }

    public function show($id)
    {
        $text = DB::table('skills')->where('skills.user_id', '=', $id)
            ->join('users', 'skills.user_id', '=', 'users.id')->where('users.id', '=', Auth::user()->id)
            ->first();

        return view('app.skill', compact('skill'));
    }

    public function edit($id){
        $row = DB::table('users') -> where('id', $id)->first();
        return view('config')->with('row', $row);
    }

    public function index()
    {
        return view('profile');
    }

    public function changeInfor(){
        return view('changeInfor');
    }

    public function rank(){
        $users = DB::table('users')->orderBy('knowledge', 'desc')->get();
        return view('ranking')->with('users', $users);
    }

    public function updateInfor(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18'
        ];
        $messages = [
            'mypassword.required' => 'Password is required',
            'password.required' => 'Password is required',
            //  'password.confirmed' => 'Password do not match',
            'password.min' => 'Password at least has 6 characters',
            'password.max' => 'Password cannot be more than 18 characters',
        ];

        $validator = Validator::make($request-> all(), $rules, $messages);

        if($validator -> fails()){
            return redirect('/changeInfor') -> withErrors($validator);
        }
        else {
                if (Hash::check($request->mypassword, Auth::user()->password)) {
                    $user = new User;
                    $user->where('email', '=', Auth::user()->email)
                        ->update(['password' => bcrypt($request->password)]);
                    return redirect('/config')->with('message', 'Password has been updated');
                } else {
                    return redirect('/changeInfor')->with('message', 'Current password is not correct');
                }
        }
    }

}
