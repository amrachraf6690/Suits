<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuitRequest extends FormRequest
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
            'title'=>'required|min:5|max:255|unique:suits',
            'discription'=>'required|min:10|max:2000',
            'price'=>'required',
            'image1'=>'required|image',
            'image2'=>'required|image',
            'image3'=>'required|image|mimes:jpg,jpeg,png',
        ];

    }
}
