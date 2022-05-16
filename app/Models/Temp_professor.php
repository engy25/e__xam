<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temp_professor extends Model
{protected $table = "temp_professors";
    use HasFactory;
    protected $fillable=[
        'id', 
    	'first_name', 
        'last_name' ,
        'email' ,
        'mobile',
        'password',
        'level_id' ,
        'department_id',
         'verified',
         'role_id',
        'created_at' ,
        'updated_at'];

        








}
