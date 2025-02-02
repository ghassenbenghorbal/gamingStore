<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductVerifyRequest extends FormRequest
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
            
            'Name' => 'required|max:50',
            'Description' => 'required',
            'Price' => 'required|numeric',
            'Discounted_Price' => 'nullable|numeric',
            'Tags' => 'required',
            'Image' => 'required|image'
   
        ];
    }
    
    public function messages()
    {
        return [
            
            
        ];
    }
}
