<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket_status extends Model
{
    public $timestamps = false;
    protected $table = 'ticket_statuses';
    
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }
}
