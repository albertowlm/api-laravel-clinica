<?php

namespace Clin\Transformers;

use Clin\Models\Clinic;
use League\Fractal\TransformerAbstract;
use Clin\Models\ClinicHealthCare;

/**
 * Class ClinicHealthCareTransformer
 * @package namespace Clin\Transformers;
 */
class ClinicHealthCareTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['clinic','healthCare'];

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
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeClinic(ClinicHealthCare $clinicHealthCare)
    {
        return $this->item($clinicHealthCare->clinic, new ClinicTransformer());
    }

    public function includeHealthCare(ClinicHealthCare $clinicHealthCare)
    {
        return $this->item($clinicHealthCare->healthCare, new HealthCareTransformer());
    }
}
