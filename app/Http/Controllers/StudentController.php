<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function addStudentForm()
    {
        return view('AddStudent');
    }

    public function addStudent(Request $request)
    {
        $student = new Student();
        $student-> first_name = $request->name;
        $student-> second_name = $request->sname;
        $student-> father_name = $request->fname;
        $student-> initial_year = $request->year;
        $student->save();
        return view('AddStudent');
    }
}
