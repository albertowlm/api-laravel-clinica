<?php

namespace Clin\Transformers;

use League\Fractal\TransformerAbstract;
use Clin\Models\User;

/**
 * Class UserTransformer
 * @package namespace Clin\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['user'];

    /**
     * Transform the \User entity
     * @param \User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int)$model->id,
            'name'       => $model->name,
            'email'      => $model->email,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }


}
