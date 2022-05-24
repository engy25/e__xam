<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'subject_id',
        'level_id',
        'department_id',
        'subject_name',

<<<<<<< HEAD

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
    
   

=======
    ];
    protected $primaryKey = 'subject_id';

    // One to Many Relationship between Subject and Level. Each Level has Many Subjects
    public function level(): BelongsTo
    {
        return $this -> belongsTo('App\Models\Level','level_id');
    }
    // One to Many Relationship between Subject and Department. Each Department has Many Subjects
    public function department(): BelongsTo
    {
        return $this -> belongsTo('App\Models\Department','department_id');
    }
>>>>>>> doctor
}
