<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deparmtent extends Model
{
    public $table='departments';

    public function groups()
    {
        return $this->hasMany('App\Models\Group', 'department_id', 'id');
    }
}
