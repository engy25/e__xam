<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'onlineExam_name' => 'required | unique:online_exams,onlineExam_name',
            'onlineExam_marks' => 'required | max:100 | numeric',
            'onlineExam_pass' => 'required | max:60 | numeric',
            'onlineExam_datetime' => 'required',
            'total_questions' => 'required | numeric',
            'onlineExam_duration' => 'required | numeric',
            'subject_id' =>'required',
         
        ];
    }
    public function messages()
    {
        return[
          
            'onlineExam_name.required' => 'This Field is required',
            'onlineExam_name.unique:online_exams,onlineExam_name' => 'Name should be Unique',
            'onlineExam_marks.required' => 'This Field is required',
            'onlineExam_marks.max:100' => 'Total Marks must not exceed 100',
            'onlineExam_marks.numeric' => 'Total Marks must be Numeric',
            'onlineExam_marks.required' => 'This Field is required',
            'onlineExam_marks.max:60' => 'Pass Mark must not exceed 60',
            'onlineExam_marks.numeric' => 'Pass Mark must be Numeric',
            'onlineExam_datetime.required' => 'This Field is required',
            'questionCount.required' => 'This Field is required',
            'total_questions.numeric' => 'Number of Questions must be Numeric',
            'onlineExam_duration.required' => 'This Field is required',
            'onlineExam_duration.numeric' => 'Duration of Exam must be Numeric',
            'subject_id'=>'required',
           

        ];
    }
    
}
