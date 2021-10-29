<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name_en' => ['required', 'string', 'max:1000'],
            'name_ar' => ['required', 'string', 'max:1000'],
            'price' => ['required', 'numeric', 'min:1', 'max:99999.99'],
            'quantity' => ['nullable', 'integer', 'min:1', 'max:9999'],
            'status' => ['required', 'integer', 'min:0', 'max:1'],
            'brand_id' => ['nullable', 'integer', 'exists:brands,id'],
            'subcategory_id' => ['nullable', 'integer', 'exists:subcategories,id'],
            'description_ar' => ['required', 'string'],
            'description_en' => ['required', 'string'],
            // image not required to be modified becuase keep old image if no new one
            'image' => ['nullable', 'max:1000', 'mimes:png,jpg,jpeg']
        ];
    }
}
