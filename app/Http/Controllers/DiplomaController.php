<?php

namespace App\Http\Controllers;
use App\Models\Diploma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class diplomaController extends Controller
{
    public function viewDiploma()
    {
        $choose[]=array();
        $choose[0]=DB::table('departments')->get();
        $choose[1]=DB::table('available_groups')->get();
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
        $diploma->student_id=1;
        $diploma->group_id=1;
        $diploma->creation_year=$request->creation_year;
        $path1=$request->file('filepath');
        $path=$path1->store('test_file');
        $diploma->file_path=$path;
        $diploma->original_file_name=$request->file('filepath')->getClientOriginalName();
        $diploma->save();
        return view('Added');
    }
}


