<?php

namespace Clin\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class HealthCare extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'logo',
        'status'
    ];


    public function clinics()
    {
        return $this->belongsToMany(
            Clinic::class,
            'clinic_health_cares',
            'health_care_id',
            'clinic_id'
        );
    }
}
