<?php

namespace App\Services;

use App\Repositories\UserManagementRepository;

class UserManagementService
{
    private $repository;

    public function __construct(UserManagementRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function filtered($terms)
    {
        return $this->repository->filtered($terms);
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function store($data)
    {
        return $this->repository->store($data);
    }

}
