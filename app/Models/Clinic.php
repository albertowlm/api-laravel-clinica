<?php

namespace Clin\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Clinic extends Model implements Transformable
{
    use TransformableTrait;
    use BelongsToTenants; //Funcionalidade MultTenans

    protected $fillable = [
        'cnpj','name','user_id'
    ];

}
