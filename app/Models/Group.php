<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $table='available_groups';

    public function diplomas()
    {
        return $this->hasMany('App\Models\Diploma', 'group_id', 'id');
    }

}
