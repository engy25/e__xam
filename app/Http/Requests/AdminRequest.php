<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'password' => 'required',
         
        ];
    }
    public function messages()
    {
        return[
          
            'last_name.required' =>'you must enter Your Last Name',
            'first_name.required' =>'you must enter your first  Name',
            'mobile.required' =>'you must enter your mobile',
            'email.required' =>'you must enter  your email ',
            'password.required' =>'you must enter your password ',
           

        ];
    }
    
}
