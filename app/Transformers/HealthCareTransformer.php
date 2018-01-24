<?php

namespace Clin\Transformers;

use League\Fractal\TransformerAbstract;
use Clin\Models\HealthCare;

/**
 * Class HealthCareTransformer
 * @package namespace Clin\Transformers;
 */
class HealthCareTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['clinics'];

    /**
     * Transform the \HealthCare entity
     * @param \HealthCare $model
     *
     * @return array
     */
    public function transform(HealthCare $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'logo'       => $model->logo,
            'status'       => $model->status,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeClinics(HealthCare $model)
    {

        if (isset($model->clinics) && !empty($model->clinics)) {
            return $this->collection($model->clinics, new ClinicTransformer());
        }
        return null;
    }
}
