<?php

namespace Clin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClinicHealthCareCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'health_care_id' => 'required|exists:health_cares,id',
            'clinic_id' => 'required|exists:clinics,id',
            'user_id' => 'required|exists:users,id'


        ];
    }
}
