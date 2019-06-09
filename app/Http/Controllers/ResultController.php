<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Models\Diploma;
use Illuminate\Http\Request;
class ResultController extends Controller
{
    public function ShowResults()
    {
        $diplomas=Diploma::with(['student', 'group', 'department'])->paginate(2);
        return view('SearchResults', compact('diplomas'));
    }


    public function ShowCoolSearch()
    {
        $years=Diploma::select('creation_year')->orderBy('creation_year', 'desk')->distinct()->get();
        $dparts=Department::all();
        $array[]=array();
        $array[0]=$years;
        $array[1]=$dparts;
        return view('Search', compact('array'));
    }


    public function Search(Request $request)
    {
        $diplomas = Diploma::with(['student', 'group', 'department']);

        if ($request->dpart_id != '')
        {
            $diplomas = $diplomas->where('department_id', '=', $request->dpart_id);
        }

        if ($request->f_year != '' or $request->s_year != '')
        {
            $diplomas = $diplomas->whereBetween('creation_year', [$request->f_year, $request->s_year]);
        }

        if ($request->search != '')
        {
            if ($request->select == 'Назва')
            {
                $searchquery = '%' . $request->search . '%';
                $diplomas = $diplomas->where('description', 'like', $searchquery);
            }
            else
            {
                $searchquery = '%' . $request->search . '%';
                $students_auto = Student::where('second_name', 'like', $searchquery)
                    ->orWhere('first_name', 'like', $searchquery)
                    ->orWhere(DB::raw('concat(second_name, " ", first_name)'), 'like', $searchquery)
                    ->orWhere(DB::raw('concat(first_name, " ", second_name)'), 'like', $searchquery)
                    ->get();
                $diplomas = $diplomas->whereIn('student_id', $students_auto);


            }
        }

        $diplomas = $diplomas->paginate(2);
        return view('SearchResults', compact('diplomas'));
    }
}
