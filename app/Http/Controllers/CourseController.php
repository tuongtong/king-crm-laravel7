<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Core\Services\CourseServiceContract;
use Core\Services\CourseRelatedService;
use App\Models\Course_student;
use App\Models\Course_log;

class CourseController extends Controller
{
    protected $service;
    protected $relateService;

    public function __construct(CourseServiceContract $service, CourseRelatedService $related)
    {
        $this->service = $service;
        $this->relateService = $related;
    }
    
    public function getList() {
        $data['courses'] = $this->service->list();
        $data['expected_courses'] = $this->service->getExpected();
        return view('course-list', $data);
    }
    
    public function getAdd() {
        $data['course_groups'] = $this->relateService->group->all();
        return view('course-add',$data);
    }
    
    public function postAdd(Request $req) {
        $course_id = $this->service->store($req);
        return redirect()->route('staff.course.list.get')->with('success', 'Đã thêm thành công!');
    }

    public function getEdit($course_id) {
        $data['course_groups'] = $this->relateService->group->all();
        $data['course'] = $this->service->find($course_id);
        return view('course-edit', $data);
    }
    
    public function postEdit($course_id, Request $req) {        
        $course_id = $this->service->update($course_id, $req);
        return redirect()->route('staff.course.list.get')->with('success', 'Lưu thay đổi thành công!');
    }
    
    public function getView($course_id) {
        $data['course'] = $this->service->show($course_id);
        return view('course-studentlist', $data);
    }

    public function getPhoneList($course_id) {
        $data['students'] = $this->service->find($course_id)->courseStudents;
        return view('course-phonelist', $data);
    }

    public function getExportExcel($course_id)
    {
        return $this->service->download($course_id);
    }

    public function getLogList() {
        $data['course_logs'] = $this->relateService->log->index();
        return view('course-loglist', $data);
    }
}
