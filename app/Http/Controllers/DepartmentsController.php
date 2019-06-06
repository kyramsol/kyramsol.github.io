<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function takeDepartment(Request $request)
    {
        $name='%'.$request->term.'%';
        $departments_auto=Department::with(['groups'])->selectRaw('name as value, id')->where('name','like', $name)->get();
        return $departments_auto;

    }
}
