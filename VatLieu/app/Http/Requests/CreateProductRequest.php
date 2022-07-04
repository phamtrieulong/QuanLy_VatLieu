<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'slug' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'status' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên nhãn hiệu không được để trống',
            'slug.required' => 'Slug không được để trống',
            'sku.required' => 'Slug không được để trống',
            'status.required' => 'Status không được để trống',
            'brand_id.required' => 'Phải chọn nhãn hiệu',
            'category_id.required' => 'Phải chọn loại sản phẩm'
        ];
    }
}
