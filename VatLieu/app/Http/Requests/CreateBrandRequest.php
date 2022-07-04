<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBrandRequest extends FormRequest
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
                'name' => 'required|string|max:255',
                'description' => 'required',
                'slug' => 'required',
                'img' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên nhãn hiệu không được để trống',
            'description.required' => 'Mô tả không được để trống',
            'slug.required' => 'Slug không được để trống',
            'img.required' => 'Ảnh không được để trống',
        ];
    }
}
