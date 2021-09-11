<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtudiantRequest extends FormRequest
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
            'first_name' => 'required|min:7|max:255',
            'last_name'  => 'required|min:7|max:255',
             'city'      => 'required|max:255',
             'address'   => 'required|max:500', 
             'postalcode'   => 'required|max:255', 
             'country'   => 'required|max:255', 
             'age'   => 'required|numeric', 
             'tel'   => 'required|max:255', 
             'image'   => 'max:2555', 
             'email'   => 'required|email|unique:users', 
             'birth'   => 'required', 
             'password'   => 'required|min:7|confirmed'
            //
        ];
    }
}
