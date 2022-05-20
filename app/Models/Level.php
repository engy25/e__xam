<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Level extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'level_name',
        
    
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $hidden = [
        
    ];
   

    ///// one to one relations between users ////
/*
    public function userlev()
    {
        
      
        return $this->hasOne(User::class,'level_id');
    }
*/



    

}
