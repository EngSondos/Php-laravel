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
     * @return array<string, mixed>
     */
    public function rules()
    {
        // dd($this->product);
        return [
            'name_en'=>['required','string','max:255'],
            'name_ar'=>['required','string','max:255'],
            'price'=>['required','numeric','between:1,999999.99'],
            'details_en'=>['required','string'],
            'details_ar'=>['required','string'],
            'quantity'=>['required','integer','between:1,999'],
            'status'=>['required','in:0,1'],
            'code'=>['required','integer','unique:products,code,'.$this->product->id],
            'image'=>['nullable','max:1024','mimes:png,jpg'],
            'brand_id'=>['required','integer','exists:brands,id'],
            'subcategory_id'=>['required','integer','exists:subcategories,id']
        ];
    }
}
