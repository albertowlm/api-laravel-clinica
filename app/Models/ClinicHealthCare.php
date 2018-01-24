<?php

namespace Clin\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ClinicHealthCare extends Model implements Transformable
{
    use TransformableTrait;
    use BelongsToTenants; //Funcionalidade MultTenans

    protected $fillable = [
        'health_care_id','clinic_id','user_id'
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }


    public function healthCare()
    {
        return $this->belongsTo(HealthCare::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
