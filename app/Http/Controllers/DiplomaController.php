<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Diploma;
use App\Models\Student;
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
    public function takeDepartment(Request $request)
    {
        $name='%'.$request->term.'%';
        $departments_auto=Department::with(['groups'])->selectRaw('name as value, id')->where('name','like', $name)->get();
        return $departments_auto;

    }
    public function takeGroup(Request $request)
    {
        $code='%'.$request->term.'%';
        $groups_auto=DB::table('available_groups')->selectRaw('group_code as value, id')->where('group_code','like', $code)->get();
        return $groups_auto;

    }
    public function Diploma($id)
    {
        $diploma=Diploma::with(['student', 'group', 'department'])->find($id);
        return view('diploma', $diploma);

    }
}


