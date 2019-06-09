<?php

namespace App\Http\Controllers;

use App\Models\Department;
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

        $searchquery='%'.$request->search.'%';
        var_dump($searchquery, $request->f_year, $request->s_year);
        $diplomas=Diploma::with(['student', 'group', 'department'])->where('description','like', $searchquery);
        if ($request->f_year!=''  or $request->s_year!='')
        {
            $diplomas = $diplomas->whereBetween('creation_year', [$request->f_year, $request->s_year]);
        }

        if ($request->d_part)
        {
            $diplomas = $diplomas->where('department_id', '=', $request->d_part);
        }
        $diplomas=$diplomas->paginate(15);
        return view('SearchResults', compact('diplomas'));
    }
}
