<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        
        'department_name',
        
    
    ];
    protected $primaryKey = 'id';

    public $timestamps = false;
    protected $hidden = [
        
    ];
    ///// one to one relations between users ////
  
    public function userdep()
    {
        
      
        return $this->hasOne(User::class);
    }

  
}
