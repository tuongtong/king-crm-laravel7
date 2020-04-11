<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    public $fillable = ['staff_id', 'client_id', 'content', 'number', 'branch_id', 'field_id', 'note', 'amount'];
    
    public function staff()
    {
        return $this->belongsTo('App\Model\Staff');
    }
    
    public function client()
    {
        return $this->belongsTo('App\Model\Client');
    }
    
    public function field()
    {
        return $this->belongsTo('App\Model\Field');
    }

    public function branch()
    {
        return $this->belongsTo('App\Model\Branch');
    }
}
