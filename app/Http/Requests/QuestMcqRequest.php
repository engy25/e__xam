<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestMcqRequest extends FormRequest
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
            'questionName' => 'required',
            'questionTitle' => 'required',
            'questionMark' => 'required | max:100 | numeric',
            'category_id' => 'required',
            'questionOptionOne' => 'required',
            'questionOptionTwo' => 'required',
            'questionOptionThree' => 'required',
            'questionOptionFour' => 'required',
            'questionAnswer' => 'required',
            'chapter_id'=>'required',
         
        ];
    }
    public function messages()
    {
        return[
          
            'questionName.required' => 'This Field is required',
            'questionQuestion.required' => 'This Field is required',
            'questionMark.required' => 'This Field is required',
            'questionMark.max:100' => 'Question Mark must not Exceed 100',
            'questionMark.numeric' => 'This Field is required',
            'category_id.required' => 'This Field is required',
            'questionOptionOne.required' => 'This Field is required',
            'questionOptionTwo.required' => 'This Field is required',
            'questionOptionThree.required' => 'This Field is required',
            'questionOptionFour.required' => 'This Field is required',
            'questionAnswer.required' => 'This Field is required',
            'chapter_id.required' => 'This Field is required',

        ];
    }
    
}
