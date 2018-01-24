<?php

namespace Clin\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;

class NameCriteria implements CriteriaInterface {

    /**
     * @var
     */
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
    public function apply($model, RepositoryInterface $repository)
    {
        if(isset($this->name))
        {
            $model = $model->where('name','like',  '%'.$this->name.'%');
        }
        return $model;
    }
}