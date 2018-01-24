<?php

namespace Clin\Services\Clinic;

use Clin\Repositories\ClinicRepository;

class StoreService
{
    /**
     * @var ClinicRepository
     */
    private $repository;

    public function __construct(ClinicRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store($name, $cnpj)
    {
        $params['name'] = $name;
        $params['cnpj'] = $cnpj;
        return $this->repository->create($params);
    }
}