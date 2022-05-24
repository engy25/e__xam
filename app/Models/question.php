<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'onlineExam_id',
        'question_title',
        'mark',
        'option_one',
        'option_two',
        'option_three',
        'option_four',
        'answer_option',
        'category',
    ];
    protected $hidden = [

    ];


    public function Online_exam()
    {
        return $this->belongsToMany('App\Models\Online_exam', 'id')->withTimestamps();
    }

}
