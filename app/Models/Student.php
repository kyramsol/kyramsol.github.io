<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $table='students';

    public function diplomas()
    {
        return $this->hasMany('App\Models\Diploma', 'student_id', 'id');
    }

    public function getGroup() {
        /**blah blah*/
        return $this->year;
    }
}
