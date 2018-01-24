<?php

namespace Clin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthCareDeleteRequest extends FormRequest
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
            'health_care' => 'required|exists:health_cares,id'
        ];
    }

    public function attributes()
    {
        return [
          'health_care' => 'Id'
        ];
    }

    public function all()
    {
        return array_replace_recursive(
          parent::all(),
            $this->route()->parameters()
        );
    }
}
