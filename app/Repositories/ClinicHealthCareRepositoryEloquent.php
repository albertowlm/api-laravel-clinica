<?php

namespace Clin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Clin\Models\ClinicHealthCare;

/**
 * Class ClinicHealthCareRepositoryEloquent
 * @package namespace Clin\Repositories;
 */
class ClinicHealthCareRepositoryEloquent extends BaseRepository implements ClinicHealthCareRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ClinicHealthCare::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function applyMultitenancy()
    {
        ClinicHealthCare::clearBootedModels();
    }
}
