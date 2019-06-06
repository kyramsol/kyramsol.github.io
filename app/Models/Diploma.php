<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{
    public $table='diplomas';

    public function student() {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }

    public function group() {
        return $this->belongsTo('App\Models\Group', 'group_id');
    }

    public function department() {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }
}
