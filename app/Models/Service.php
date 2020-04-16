<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function tickets()
    {
        return $this->belongsToMany('App\Models\Ticket');
    }
}
