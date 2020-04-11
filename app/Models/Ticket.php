<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $timestamps = true;
    public $table = 'tickets';
    public $fillable = ['client_id', 'staff_id', 'requestment', 'model', 'cpu', 'ram', 'storage', 'other', 'note', 'ticket_status_id', 'price'];
    
    public function client()
    {
        return $this->belongsTo('App\Model\Client');
    }
    
    public function staff()
    {
        return $this->belongsTo('App\Model\Staff');
    }
    
    public function ticketLogs()
    {
        return $this->hasMany('App\Model\Ticket_log')->orderBy('id', 'desc');
    }
    
    public function ticketStatus()
    {
        return $this->belongsTo('App\Model\Ticket_status');
    }

    public function feedback()
    {
        return $this->hasOne('App\Model\Feedback');
    }
}
