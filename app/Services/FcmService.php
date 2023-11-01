<?php

namespace App\Services;

use App\Repositories\FcmRepository;

class FcmService
{
    private $repository;

    public function __construct(FcmRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register($token)
    {
        $this->repository->closeSessionUser($token);
        return $this->repository->register($token);
    }
}