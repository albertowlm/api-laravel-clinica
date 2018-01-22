<?php

namespace Clin\Transformers;

use League\Fractal\TransformerAbstract;
use Clin\Models\Clinic;

/**
 * Class ClinicTransformer
 * @package namespace Clin\Transformers;
 */
class ClinicTransformer extends TransformerAbstract
{

    /**
     * Transform the \Clinic entity
     * @param \Clinic $model
     *
     * @return array
     */
    public function transform(Clinic $model)
    {
        return [
            'id'         => (int) $model->id,
            'cnpj'       => $model->cnpj,
            'name'       => $model->name,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }


}
