<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Diploma;
use Illuminate\Http\Request;
class ResultController extends Controller
{
    public function ShowResults()
    {
        $diplomas=Diploma::with(['student', 'group', 'department'])->paginate(15);
        return view('SearchResults', compact('diplomas'));
    }
    public function Search(Request $request)
    {
        if($request->select=='Назва')
        {
        $searchquery='%'.$request->search.'%';
        $year=$request->year;
        $diploma=Diploma::with(['student', 'group', 'department'])->where('description','like', $searchquery)->paginate(15);
        }
        else
        {
            /*$searchquery=$request->search.'%';*/

           /* $diplomas
                ->where('second_name','like', $searchquery)
                ->orWhere('first_name','like', $searchquery)
                ->orWhere(DB::raw('concat(second_name, " ", first_name)'),'like', $searchquery)
                ->orWhere(DB::raw('concat(first_name, " ", second_name)'),'like', $searchquery)
                ->paginate(15);*/
        }


        return view('SearchResults', compact('diplomas'));
    }
}
