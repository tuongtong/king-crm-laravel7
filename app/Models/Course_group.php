<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course_group extends Model
{
    protected $table = 'course_groups';

    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }
}
