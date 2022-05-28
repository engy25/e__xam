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
        'onlineExam_name',
        'onlineExam_marks',
        'onlineExam_pass',
        'onlineExam_datetime',
        'total_questions',
        'onlineExam_duration',
        'onlineExam_createBy',
        'onlineExam_status',
        'subject_id',
        'created_at',
        'updated_at',


    ];
    public $timestamps = false;

    protected $primaryKey = 'id';
    protected $hidden = [

    ];
   
   

    public function subject(): BelongsTo
    {

        return $this -> belongsTo('App\Models\Subject','subject_id');
    }

  
  
}
