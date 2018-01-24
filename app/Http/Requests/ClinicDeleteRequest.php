<?php

namespace Clin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClinicDeleteRequest extends FormRequest
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
            'clinic' => 'required|exists:clinics,id'
        ];
    }

    public function attributes()
    {
        return [
          'clinic' => 'Id'
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
