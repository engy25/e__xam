<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable = [
        'level_id',
        'level_name',
        
    
    ];


    protected $hidden = [
        
    ];

    ///// one to one relations between users ////
    public function user()
    {
        
        return $this -> belongsTo('App\Models\User');
    }

    ///// one to many relations between department ////

    

}
