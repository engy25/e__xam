<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Online_exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'doctor_id',
        'user_id',
        'onlineExam_name',
        'onlineExam_marks',
        'onlineExam_pass',
        'onlineExam_datetime',
        'total_questions',
        'onlineExam_duration',
        'onlineExam_createBy',
        'onlineExam_status',
        'subject_id',


    ];
    protected $hidden = [

    ];
    public function question()
    {
        return $this->hasMany('App\Models\question');
    }

    public function user()
    {
       
        return $this -> hasOne('App\Models\User','user_id');
    }
   

    public function subject(): BelongsTo
    {

        return $this -> belongsTo('App\Models\Subject','subject_id');


    }
}
