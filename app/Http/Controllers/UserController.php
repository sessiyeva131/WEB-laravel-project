<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Students;
use App\Models\Grades;
// use App\Models\Attendance;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function login(){
        return view('welcomepage');
    }

    public function register(){
        return view('signup');
    }

    public function save(Request $request){
        // return $request->input();
        $request->validate([
            'username' => 'required',
            'subjectname' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|max:13'
        ]);

        $admin = new Admin;
        $admin->username = $request->username;
        $admin->subjectname = $request->subjectname;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $save = $admin->save();

        if($save){
            return back();
        }else{

        }
    }

    public function check(Request $request){
        // return $request->input();

        $email = $request->input('email');
        $request->session()->put('email', $email);
        
        return redirect('dashboard');


        $request->validate([
            'email'=>'required|email',
            'password'=> 'password|min:6|max:13'
        ]);
    }
    public function dashboard(){
        $students = Students::all();
        $grades = Grades::all();
        // $attendance = Attendance::all();

        $numberOfstudents = DB::table('STUDENTS')->count();
        $avgGrade = DB::table('grades')->avg('grade');

        
        // echo $numberOfstudents;
        return view('dashboard', compact('numberOfstudents', 'avgGrade', 'students', 'grades')); 
    }

    function change(){
        $students = Students::all();
        $grades = Grades::all();

        $numberOfstudents = DB::table('STUDENTS')->count();
        $avgGrade = DB::table('grades')->avg('grade');

        $curr = App::getLocale();
        echo $curr;
        if($curr == 'en'){
            $curr = 'ru';
        } else {
            $curr = 'en';
        }

        App::setLocale($curr);
        // Session()->put('locale', $curr);
        session(['APP_LOCALE' => $curr]);
        
        return view('dashboard', compact('numberOfstudents', 'avgGrade', 'students', 'grades')); 
    }
}
