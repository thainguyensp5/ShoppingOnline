<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingAddRequest extends FormRequest
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
            'config_key' => 'required|max:255|min:3',
            'config_value' => 'required|max:255|min:3',
        ];
    }

    public function messages()
    {
        return[
            'config_key.required' => 'config_key không được để trống',
            'config_value.required' => 'config_value không được để trống',
        ];
    }
}
 