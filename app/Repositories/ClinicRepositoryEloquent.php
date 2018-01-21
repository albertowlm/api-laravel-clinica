<?php

namespace Clin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Clin\Models\Clinic;

/**
 * Class ClinicRepositoryEloquent
 * @package namespace Clin\Repositories;
 */
class ClinicRepositoryEloquent extends BaseRepository implements ClinicRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Clinic::class;
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
        Clinic::clearBootedModels();
    }
}
