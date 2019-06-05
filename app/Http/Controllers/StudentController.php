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
        return view('Added');
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
        return view('Added');
    }
}
