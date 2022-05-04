<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id',
        'doctor_id',
        'user_id',
        'subject_name',
        
    
    ];

//// relationship between users(doctors) and subjects
    public function doctor()
    {
        return $this->belongsTo(User::class,'subject_id');
    }
}
