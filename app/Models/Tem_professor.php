<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tem_professor extends Model
{
    use HasFactory;
    protected $fillable=[
        'id', 
    	'first_name', 
        'last_name' ,
        'email' ,
        'password',
        'level_id' ,
        'department_id',
         'verified',
         'role_id',
        'created_at' ,
        'updated_at'];

        








}
