<?php
namespace Clin\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;

class ClinicIdCriteria implements CriteriaInterface {

    /**
     * @var
     */
    private $clinicId;

    public function __construct($clinicId)
    {
        $this->clinicId = $clinicId;
    }
    public function apply($model, RepositoryInterface $repository)
    {
        if(isset($this->clinicId)) {
            $model = $model
                ->where('clinic_id', '=', $this->clinicId);
        }

        return $model;
    }


}