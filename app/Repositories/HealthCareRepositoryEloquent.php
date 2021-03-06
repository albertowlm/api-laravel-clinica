<?php

namespace Clin\Repositories;

use Clin\Criterias\StatusCriteria;
use Clin\Presenters\HealthCarePresenter;
use Clin\Services\HealthCare\PhotoHealthCareService;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Clin\Models\HealthCare;

/**
 * Class HealthCareRepositoryEloquent
 * @package namespace Clin\Repositories;
 */
class HealthCareRepositoryEloquent extends BaseRepository implements HealthCareRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return HealthCare::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return HealthCarePresenter::class;
    }
    
    public function applyMultitenancy()
    {
        HealthCare::clearBootedModels();
    }

}
