<?php

namespace Core\Repositories;

interface CourseLogRepositoryContract
{
    public function all();
    public function index();
    public function paginate();
    public function find($id);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
}