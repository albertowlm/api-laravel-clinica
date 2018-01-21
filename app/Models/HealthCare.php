<?php

namespace Clin\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class HealthCare extends Model implements Transformable
{
    use TransformableTrait;
    use BelongsToTenants; //Funcionalidade MultTenans

    protected $fillable = [
        'name','logo','status'
    ];

}
