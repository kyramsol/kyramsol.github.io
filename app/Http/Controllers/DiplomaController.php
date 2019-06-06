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

    public function viewDiplomaToEdit($id)
    {
        $diploma=Diploma::find($id);

        return view('AddDiplomaToEdit', compact('diploma'));
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
        $diploma->subject=$request->subject;
        $diploma->type=$request->type;
        $path=$request->file('filepath')->store('test_file');
        $diploma->file_path=$path;
        $diploma->original_file_name=$request->file('filepath')->getClientOriginalName();
        $diploma->save();
        return view('Added');
    }
    public function editDiploma(Request $request, $id)
    {
        $diploma=Diploma::find($id);
        $diploma->mark=$request->mark;
        $diploma->kurator=$request->teacher;
        $diploma->description=$request->call;
        $diploma->subject=$request->subject;
        $diploma->type=$request->type;
        $diploma->creation_year=$request->creation_year;
        $path=$request->file('filepath')->store('test_file');
        $diploma->file_path=$path;
        $diploma->original_file_name=$request->file('filepath')->getClientOriginalName();
        $diploma->student_id=$request->student_id;
        $diploma->group_id=$request->group_id;
        $diploma->save();
        return view('Added');
    }




    public function Diploma($id)
    {
        $diploma=Diploma::with(['student', 'group', 'department'])->find($id);
        return view('diploma', compact('diploma'));

    }
}


