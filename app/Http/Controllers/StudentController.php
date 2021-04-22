<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    function index(){
        $students = Students::all();
        return view('students')->with('students', $students);
        // return view('students', ['students' => $students, 'layout' => 'index']);
    }

    function create(){
        $students = Students::all();
        return view('students')->with('students', $students);
    }

    function store(Request $request){
        $student = new Students();
        $student->student_id = $request->input('student_id');
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->email = $request->input('email');
        $student->course = $request->input('course');

        if($request->hasFile('image')){
            // echo "works";
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/'), $filename);
            $student->image = $filename;
        } else {
            return $request;
            $student->image = '';
        }

        $student->save();

        return redirect('students');
    }

    function show($id){
        $student = Students::find($id);
        $students = Students::all();
        return view('students', ['students' => $students,'student' => $student, 'layout' => 'show']);
    }

    function edit($id){
        $student = Students::find($id);
        $students = Students::all();
        return view('students', ['students' => $students,'student' => $student, 'layout' => 'edit']);
    }

    function update(Request $request, $id){
        $student = Students::find($id);
        $student->student_id = $request->input('student_id');
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->email = $request->input('email');
        $student->course = $request->input('course');

        $student->save();
        return redirect('students');
    }

    function destroy($id){
        $student = Students::find($id);
        $grade = Grades::find($id);
        if($grade == null) {
            $student->delete();
        } else {
            $grade->delete();
            $student->delete();
        }
        return redirect('students');
    }
}
