<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Feedback;
use App\Model\Ticket;

class FeedbackController extends Controller
{
    protected $model;
    public function __construct(Feedback $model)
    {
        $this->model = $model;
    }

    public function getList()
    {
        $data['tickets'] = ticket::where('ticket_status_id', 5)->with('client', 'feedback')->orderBy('id', 'desc')->paginate(50);
        return view('feedback-list', $data);
    }
}
