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
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
