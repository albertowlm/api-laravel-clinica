<?php

namespace Clin\Transformers;

use Clin\Models\HealthCare;
use League\Fractal\TransformerAbstract;
use Clin\Models\Clinic;

/**
 * Class ClinicTransformer
 * @package namespace Clin\Transformers;
 */
class ClinicTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['user', 'health_cares'];

    /**
     * Transform the \Clinic entity
     * @param \Clinic $model
     *
     * @return array
     */
    public function transform(Clinic $model)
    {
        return [
            'id'         => (int)$model->id,
            'cnpj'       => $model->cnpj,
            'name'       => $model->name,
            'user_id'    => $model->user_id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }


    public function includeUser(Clinic $model)
    {
        return $this->item($model->user, new UserTransformer());
    }

    public function includeHealthCares(Clinic $model)
    {
        if (isset($model->healthCares) && !empty($model->healthCares)) {
            return $this->collection($model->healthCares, new HealthCareTransformer());
        }
        return null;
    }


}
