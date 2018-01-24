<?php

namespace Clin\Services\HealthCare;

use Clin\Repositories\HealthCareRepository;

class DeleteService
{
    /**
     * @var HealthCareRepository
     */
    private $repository;

    public function __construct(HealthCareRepository $repository)
    {
        $this->repository = $repository;
    }

    public function delete($id)
    {
        $healthCare = $this->repository->skipPresenter()->find($id);
        if($healthCare->clinics->count() > 0)
        {
            throw new \Exception('Nao pode excluir o plano de saude porque ele ja possui clinica associada a ele');
        }


        return $this->repository->delete($id);
    }

}