<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id',
        'level_id',
        'department_id',
        'subject_name',
        
    
    ];
    public $timestamps = false;
    protected $primaryKey = 'subject_id';
   // one to many relationshib between subject and level each level has many subjects
    public function level(): BelongsTo
    {
       
        return $this -> belongsto('App\Models\Level','level_id');
    }
    // one to many relationshib between subject and department each department has many subjects
    public function department(): BelongsTo
    {
       
        return $this -> belongsTo('App\Models\Department','department_id');
    }

   

}
