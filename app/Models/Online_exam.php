<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online_exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'onlineExam_id',
        'doctor_id',
        'onlineExam_name',
        'onlineExam_datetime',
        'total_questions',
        'onlineExam_duration',
        'onlineExam_createBy',
        'onlineExam_status',
        
    
    ];
    protected $hidden = [
        
    ];
}
