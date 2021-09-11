<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEnseignantRequest extends FormRequest
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
            'first_name' => 'required|min:5|max:255',
            'last_name' => 'required|min:5|max:255',
            'city' => 'required|min:5|max:255',
            'address' => 'required|min:10|max:255',
            'postalcode'   => 'required|max:255', 
            'country' => 'required|min:5|max:255',
            'tel' => 'required',
            'diploma' => 'required',
            'email'   => 'required|email|unique:users', 
            'password' => 'required|min:8|confirmed',
            'experience' => 'required|min:20|max:2000',
            'birth'   => 'required', 
            'image'         =>  'max:2048'
            //
        ];
    }
}
