<?php

namespace Core\Services;

use Core\Repositories\CourseRepositoryContract;
use App\Helpers\DownloadExcel;

class CourseService implements CourseServiceContract
{
    protected $repository;

    public function __construct(CourseRepositoryContract $repository)
    {
        return $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function getExpected()
    {
        return $this->repository->getExpected();
    }

    public function paginate()
    {
        return $this->repository->paginate();
    }
    
    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function store($req)
    {
        $data = $this->repository->fillable($req);
        return $this->repository->store($data);
    }

    public function update($id, $req)
    {
        $data = $this->repository->fillable($req);
        return $this->repository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }

    public function download($id)
    {
        $course = $this->find($id);
        $students = $course->courseStudents;
        foreach ($students as $i => $student) {
            $student_arr[$i]['name'] = $student->client->name;
            $student_arr[$i]['phone'] = $student->client->phone;
            $student_arr[$i]['email'] = $student->client->email;
            $student_arr[$i]['deal_rate'] = $student->deal_rate;
            $student_arr[$i]['deal_note'] = $student->deal_note;
            $student_arr[$i]['tuition_done'] = $student->tuition_done;
        }
        return new DownloadExcel($course->shortname.'-list', 'xls', $student_arr);
    }
}