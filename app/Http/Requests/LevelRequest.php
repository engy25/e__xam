<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LevelRequest extends FormRequest
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
            
            'level_name' => 'required',
           
        ];
    }
    public function messages()
    {
        return[
            'level_name.required' =>'you must enter level Name',
            

        ];
    }
    
}
