<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public $table = 'receipts';
    public $fillable = ['id', 'number', 'client_id', 'staff_id', 'field_id', 'branch_id', 'content', 'amount'];
    
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
