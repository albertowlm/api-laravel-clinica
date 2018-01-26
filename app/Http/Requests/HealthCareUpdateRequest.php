<?php

namespace Clin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthCareUpdateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'logo' => 'required',
            'status' => 'required'
        ];
    }
}
