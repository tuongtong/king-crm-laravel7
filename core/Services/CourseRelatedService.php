<?php

namespace Core\Services;

use Core\Services\CourseGroupServiceContract;
use Core\Services\CourseLogServiceContract;
use Core\Services\CourseStudentServiceContract;

class CourseRelatedService
{
    public $group;
    public $log;
    public $student;

    public function __construct(CourseGroupServiceContract $group, CourseStudentServiceContract $student, CourseLogServiceContract $log)
    {
        $this->group = $group;
        $this->log = $log;
        $this->student = $student;
    }
}