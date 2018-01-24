<?php

namespace Clin\Services\Clinic;

use Clin\Repositories\ClinicRepository;

class UpdateService
{
    /**
     * @var ClinicRepository
     */
    private $repository;

    public function __construct(ClinicRepository $repository)
    {
        $this->repository = $repository;
    }

    public function update($id ,$cnpj, $name)
    {

        $params['cnpj']   = $cnpj;
        $params['name']   = $name;

        return $this->repository->update($params,$id);
    }
}