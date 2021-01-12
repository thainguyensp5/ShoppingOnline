<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'required|max:255|min:10',
            'price' => 'required',
            'category_id' => 'required',
            'content' =>'required|min:10'
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'Tên không được để trống',
        'name.max'  => 'Tên sản phẩm dài nhất 255 kí tự',
        'name.min'  => 'Tên sản phẩm ngắn nhất 10 kí tự',
        'price.required' => 'Giá không được để trống',
        'category_id.required' => 'Danh mục là bắt buộc',
        'content.required' => 'Vui lòng nhập nội dung',
        'content.min' => 'Nội dung phải dài hơn 10 kí tự'
    ];
}
}
