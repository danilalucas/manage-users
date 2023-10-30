<?php

namespace App\Services;

use App\Repositories\RoleRepository;

class RoleService
{
    private $repository;

    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }
}