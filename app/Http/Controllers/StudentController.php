<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function addStudentForm()
    {
        return view('AddStudentEmpty');
    }

    public function addStudent(Request $request)
    {
        $student = new Student();
        $student-> first_name = $request->name;
        $student-> second_name = $request->sname;
        $student-> father_name = $request->fname;
        $student-> initial_year = $request->year;
        $student->save();
        $id=$student->id;
        return view('Added', compact('id'));
    }

    public function getStudentData($id){
        $student=Student::find($id);
        return view('AddStudent', compact('student'));
    }

    public function addStudentData(request $request, $id)
    {
        $student=Student::find($id);
        $student-> first_name = $request->name;
        $student-> second_name = $request->sname;
        $student-> father_name = $request->fname;
        $student-> initial_year = $request->year;
        $student->save();
        return view('Added',compact('id'));
    }
    public function takeStudent(Request $request)
    {
        $s_name=$request->term.'%';
        $students_auto=Student::selectRaw('concat(second_name, " ", first_name, " ", father_name) as value, id')
            ->where('second_name','like', $s_name)
            ->orWhere('first_name','like', $s_name)
            ->orWhere(DB::raw('concat(second_name, " ", first_name)'),'like', $s_name)
            ->orWhere(DB::raw('concat(first_name, " ", second_name)'),'like', $s_name)
            ->get();
        return $students_auto;

    }
}
