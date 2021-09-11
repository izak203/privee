<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required|min:10|max:2000',
            'sub_title' => 'required',
            'body' =>  'required|min:10|max:2000',
            'second_title' => 'required',
            'excerpt' => 'required|min:10|max:2000',
            'third_title' => 'required',
            'main' => 'required|min:10|max:2000',
            'date_product' => 'required',
            'photo' => 'max:2048',
            'media' => 'max:2048',
            'upload' => 'max:2048',
            'fichier' => 'max:2048'
            //
        ];
    }
}
