<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'exclude' => 'array',
        'alsomatch' => 'array'
    ];

    public $timestamps = true;
    public $table = 'courses';
    public $dates = ['deleted_at'];
    public $fillable = ['name', 'shortname', 'lesson', 'opening_at', 'schedule', 'maxseat', 'teacher', 'tuition', 'note', 'exclude' , 'alsomatch', 'is_expected', 'course_group_id'];
    
    public function courseStudents()
    {
        return $this->hasMany('App\Models\Course_student');
    }

    public function linkName() {
        return '<a href="'.route('staff.course.view.get', ['course_id' => $this->id], false).'">'.$this->name.'</a>';
    }

    public function sum() {
        return count($this->courseStudents);
    }

    public function sumDone() {
        $students_done = $this->courseStudents;
        $count = 0;
        foreach($students_done as $data) {
            if($data->tuition_done >= ($this->tuition*((100-$data->deal_rate)/100))) $count++;
        }
        return $count;
    }

    public function sumDeposited() {
        $students_done = $this->courseStudents;
        $count = 0;
        foreach($students_done as $data) {
            if($data->tuition_done > 0  or $data->deal_rate == 100) $count++;
        }
        return $count;
    }

    public function isFull()
    {
        return ($this->sumDone() >= $this->maxseat);
    }

    public function getAlsoMatch()
    {
        $course_group_ids = Course_group::findMany($this->alsomatch)->pluck('id')->toArray();
        return Course::whereIn('course_group_id', $course_group_ids)->pluck('id')->toArray();
    }

    public function getExcludes()
    {
        $course_group_ids = Course_group::findMany($this->exclude)->pluck('id')->toArray();
        return Course::whereIn('course_group_id', $course_group_ids)->pluck('id')->toArray();
    }

    public function getPotentials()
    {
        $client_ids = Course_student::whereIn('course_id', $this->getAlsoMatch())->whereNotIn('course_id', $this->getExcludes())->pluck('client_id')->toArray();
        return Client::whereIn('id', $client_ids)->get();
    }
}
