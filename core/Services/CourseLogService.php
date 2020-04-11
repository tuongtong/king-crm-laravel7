<?php

namespace Core\Services;

use Core\Repositories\CourseLogRepositoryContract;

class CourseLogService implements CourseLogServiceContract
{
    protected $repository;

    public function __construct(CourseLogRepositoryContract $repository)
    {
        return $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function paginate()
    {
        return $this->repository->paginate();
    }
    
    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function store($data)
    {
        return $this->repository->store($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}