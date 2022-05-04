<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id', 
        'subject_id', 
        'doctor_username',
        'doctor_firstname', 
        'doctor_lastname',
        'password',
        'mobile',
        'profile_pic',
        
    
    ];


    protected $hidden = [
        
    ];
}
