<?php

namespace App\Http\Controllers;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function takeGroup(Request $request)
    {
        $code='%'.$request->term.'%';
        $groups_auto=DB::table('available_groups')->selectRaw('group_code as value, id')->where('group_code','like', $code)->get();
        return $groups_auto;

    }
}
