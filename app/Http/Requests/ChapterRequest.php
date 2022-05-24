<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterRequest extends FormRequest
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
            
            
            'chapter_name' => 'required',
            'describe_chapter' => 'required',
            
        ];
    }
    public function messages()
    {
        return[
            
            'chapter_name.required' =>'you must enter chapter Name',
            'describe_chapter.required' =>'you must enter Describe Chapter',
            
            

        ];
    }
    
}
