<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Exam_structure extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'exam_id',
        'subject_id',
        'chapter_number ',
        'num_of_question',
        'category_id',
        'created_at',
        'updated_at',
        
       


    ];
    public function online_exam(): BelongsTo
    {

        return $this -> belongsto('App\Models\Online_exam','exam_id');
    }
    public function category(): BelongsTo
    {

        return $this -> belongsto('App\Models\Category','category_id');
    }

    public function subject(): BelongsTo
    {

        return $this -> belongsto('App\Models\Subject','subject_id');
    }


}
