<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = "roles";
    protected $fillable=['role_id','role_name'];
    public $timestamps=false;
 ///// one to one relations between users ////
    public function user()
    {
        
        return $this -> belongsTo('App\Models\User');
    }

}
