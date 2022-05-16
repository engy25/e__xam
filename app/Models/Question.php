<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';
    protected $fillable = ['question_id','onlineExam_id','question_title','mark','option_one','option_two','option_three','option_four','answer_option','category'];
    public $timestamps=false;
}
