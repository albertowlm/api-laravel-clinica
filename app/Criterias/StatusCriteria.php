<?php

namespace Clin\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;

class StatusCriteria implements CriteriaInterface {

    /**
     * @var
     */
    private $status;

    public function __construct($status)
    {
        $this->status = $status;
    }
    public function apply($model, RepositoryInterface $repository)
    {
        if(isset($this->status))
        {
            $model = $model
                ->where('status','=',  $this->status);
        }
        return $model;
    }
}