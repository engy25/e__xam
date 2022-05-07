<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_id',
        
        'department_name',
        
    
    ];
    protected $primaryKey = 'department_id';

    public $timestamps = false;
    protected $hidden = [
        
    ];
    ///// one to one relations between users ////
    public function user()
    {
        
        return $this -> belongsTo('App\Models\User');
    }

  
}
