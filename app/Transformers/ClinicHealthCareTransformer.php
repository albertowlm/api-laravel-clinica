<?php

namespace Clin\Transformers;



use League\Fractal\TransformerAbstract;
use Clin\Models\ClinicHealthCare;

/**
 * Class ClinicHealthCareTransformer
 * @package namespace Clin\Transformers;
 */
class ClinicHealthCareTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['health_cares'];

    /**
     * Transform the \ClinicHealthCare entity
     * @param \ClinicHealthCare $model
     *
     * @return array
     */
    public function transform(ClinicHealthCare $model)
    {


        return [
            'id'         => (int) $model->id,
            'clinic_id'       => $model->clinic_id,
            'health_care_id'       => $model->health_care_id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }


//    public function includeClinic(ClinicHealthCare $model)
//    {
//        return $this->item($model->clinic, new ClinicTransformer());
//    }

    public function includeHealthCares(ClinicHealthCare $model)
    {
        return $this->item($model->healthCare, new HealthCareTransformer());
    }


}
