<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    //
    function index(){
        $grades = Grades::all();
        return view('grades')->with('grades', $grades);
        // return view('students', ['students' => $students, 'layout' => 'index']);
    }

    function create(){
        $grades = Grades::all();
        return view('grades')->with('grades', $grades);
    }

    function store(Request $request){
        $grades = new Grades();
        $grades->student_id = $request->input('student_id');
        $grades->work_name = $request->input('work_name');
        $grades->grade = $request->input('grade');
        $grades->save();
        return redirect('grades');
    }

    function show($id){
        $grade = Grades::find($id);
        $grades = Grades::all();
        return view('grades', ['grades' => $grades,'grade' => $grade, 'layout' => 'show']);
    }

    function edit($id){
        $grade = Grades::find($id);
        $grades = Grades::all();
        return view('grades', ['grades' => $grades,'grade' => $grade, 'layout' => 'show']);
    }

    function update(Request $request, $id){
        $grades = Grades::find($id);
        $grades->student_id = $request->input('student_id');
        $grades->work_name = $request->input('work_name');
        $grades->grade = $request->input('grade');
        $grades->save();
        return redirect('grades');
    }

    function destroy($id){
        $grade = Grades::find($id);
        $grade->delete();
        return redirect('grades');
    }
}
