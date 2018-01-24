<?php

namespace Clin\Services\HealthCare;

use Clin\Repositories\HealthCareRepository;

class StoreService
{
    /**
     * @var HealthCareRepository
     */
    private $repository;

    public function __construct(HealthCareRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store($name, $logo, $status)
    {
        $params['name']   = $name;
        $params['logo']   = $logo;
        $params['status'] = $status;

        return $this->repository->create($params);
    }
}