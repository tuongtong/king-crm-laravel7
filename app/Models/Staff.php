<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    protected $table = 'staffs';
    protected $fillable = ['id', 'phone', 'name', 'birthday'];
    protected $hidden = [
        'matkhau', 'remember_token'
    ];
    public function username()
    {
        return 'phone';
    }

    public function tickets() {
        return $this->hasMany('App\Model\Ticket');
    }

    public function receipts() {
        return $this->hasMany('App\Model\Receipt');
    }

    public function group()
    {
        return $this->belongsTo('App\Model\Group', 'group_id');
    }
}
