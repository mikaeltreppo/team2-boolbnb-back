<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
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
        return [
            
                'title' => 'required|max:255',
                'description' => 'required',
             /*   'cover_image' => 'required',*/
                'price' => 'required',
                'address' => 'required',
                'beds' => 'required',
                'bathrooms' => 'required',
                'bedrooms' => 'required',
                'size_m2' => 'required'

        ];
    }
}