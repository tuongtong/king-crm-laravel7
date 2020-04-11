<?php

namespace Core\Services;

use Core\Repositories\TicketRepositoryContract;
use Core\Repositories\TicketRelatedRepository;

class TicketService implements TicketServiceContract
{
    protected $repository;
    protected $relatedRepository;

    public function __construct(TicketRepositoryContract $repository, TicketRelatedRepository $related)
    {
        $this->repository = $repository;
        $this->relatedRepository = $related;
    }

    public function all()
    {
        return $this->repository->all();
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
        $data['ticket_status_id'] = 1;
        $ticket = $this->repository->store($data);
        $log['ticket_id'] = $ticket->id;
        $log['staff_id'] = UserInfo()->id;
        $log['content'] = "Đang chờ xử lý.";
        $log['is_public'] = true;
        $this->relatedRepository->log->store($log);
        return $ticket;
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

    public function getList()
    {
        return $this->repository->getAllWithoutDone();
    }

    public function setStatusId($id, $ticketstatus_id, $price)
    {
        $data['ticket_status_id'] = $ticketstatus_id;
        if($price != NULL) $data['price'] = $price;
        return $this->repository->update($id, $data);
    }

    public function getView($id)
    {
        $data['ticket'] = $this->repository->getView($id);
        $data['ticket_statuses'] = $this->relatedRepository->status->all();
        return $data;
    }
}