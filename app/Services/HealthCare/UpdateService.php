<?php

namespace Clin\Services\HealthCare;

use Clin\Repositories\HealthCareRepository;

class UpdateService
{
    /**
     * @var HealthCareRepository
     */
    private $repository;

    public function __construct(HealthCareRepository $repository)
    {
        $this->repository = $repository;
    }

    public function update($id ,$name, $logo, $status)
    {

        $params['name']   = $name;
        $params['logo']   = $logo;
        $params['status'] = $status;

        return $this->repository->update($params,$id);
    }
}