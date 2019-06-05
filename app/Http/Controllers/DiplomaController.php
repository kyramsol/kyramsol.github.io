<?php

namespace App\Http\Controllers;

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

    public function saveDiploma()
    {
        $pepka= 'govno';
        return $pepka;
    }

}
