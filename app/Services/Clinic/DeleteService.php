<?php

namespace Clin\Services\Clinic;

use Clin\Repositories\ClinicRepository;

class DeleteService
{
    /**
     * @var ClinicRepository
     */
    private $repository;

    public function __construct(ClinicRepository $repository)
    {
        $this->repository = $repository;
    }

    public function delete($id)
    {
        /**
         * @var \Clin\Models\Clinic $clinic
         */
        $clinic = $this->repository->skipPresenter()->find($id);
        $clinic->healthCares()->sync([]);
        return $this->repository->delete($id);
    }
}