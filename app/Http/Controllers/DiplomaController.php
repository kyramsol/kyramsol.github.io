<?php

namespace App\Http\Controllers;
use App\Models\Diploma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class diplomaController extends Controller
{
    public function viewDiploma()
    {
        return view('AddDiploma', compact('choose'));
    }
    public function viewfiletest()
    {
        return view('file_test');
    }
    public function saveDiploma(Request $request)
    {
        $diploma=new Diploma();
        $diploma->mark=$request->mark;
        $diploma->kurator=$request->teacher;
        $diploma->description=$request->call;
        $diploma->student_id=$request->student_id;
        $diploma->group_id=$request->group_id;
        $diploma->creation_year=$request->creation_year;
        $path=$request->file('filepath')->store('test_file');
        $diploma->file_path=$path;
        $diploma->original_file_name=$request->file('filepath')->getClientOriginalName();
        $diploma->save();
        return view('Added');
    }
    public function takeStudent(Request $request)
    {
        $s_name=$request->term.'%';
        $students_auto=DB::table('students')->selectRaw('second_name as value, id')->where('second_name','like', $s_name)->get();
        return $students_auto;

    }
    public function takeDepartment(Request $request)
    {
        $name='%'.$request->term.'%';
        $departments_auto=DB::table('departments')->selectRaw('name as value, id')->where('name','like', $name)->get();
        return $departments_auto;

    }
    public function takeGroup(Request $request)
    {
        $code='%'.$request->term.'%';
        $groups_auto=DB::table('available_groups')->selectRaw('group_code as value, id')->where('group_code','like', $code)->get();
        return $groups_auto;

    }
}


