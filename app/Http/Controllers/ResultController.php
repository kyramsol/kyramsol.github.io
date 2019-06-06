<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Diploma;

class ResultController extends Controller
{
    public function ShowResults()
    {
        $diplomas=Diploma::with(['student', 'group', 'department'])->get();
        return view('SearchResults', compact('diplomas'));
    }

}
