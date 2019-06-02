<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function ShowResults()
    {
        $students=DB::table('students')->get();
        return view('SearchResults', compact('students'));
    }
}
