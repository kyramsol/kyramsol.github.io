<?php

namespace App\Http\Controllers;

use App\Models\Diploma;

use App\Models\Group;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class diplomaController extends Controller
{
    public function viewDiploma()
    {
        $departments=Department::with(['groups'])->get();
        return view('AddDiploma', ['departments' => $departments]);
    }

    public function viewDiplomaToEdit($id)
    {
        $diplomas=Diploma::find($id);
        $departments=Department::with(['groups'])->get();
        $diploma[]=array();
        $diploma[0]=$diplomas;
        $diploma[1]=$departments;
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
        $diploma->department_id=$request->department_id;
        $diploma->creation_year=$request->creation_year;
        $diploma->subject=$request->subject;
        $diploma->type=$request->type;
        $path=$request->file('filepath')->store('test_file');
        $diploma->file_path=$path;
        $diploma->original_file_name=$request->file('filepath')->getClientOriginalName();
        $diploma->save();
        $id=$diploma->id;
        return view('AddedDiploma', compact('id'));
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
        $diploma->department_id=$request->department_id;
        $diploma->save();
        $id=$diploma->id;
        return view('AddedDiploma', compact('id'));
    }




    public function Diploma($id)
    {
        $diploma=Diploma::with(['student', 'group', 'department'])->find($id);
        return view('diploma', compact('diploma'));
    }
    public function DownloadDiploma($id){
        $diploma=Diploma::find($id);

        $file = Storage::get($diploma->file_path);
        $headers = [
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="'.$diploma->original_file_name.'"',
        ];

        return \Response::make($file, 200, $headers);


    }
}


