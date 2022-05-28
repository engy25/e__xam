<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Chapter extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'chapter_name',
        'describe_chapter',
        'subject_id',
        'chapter_num',
    ];
    protected $table = "chapters";
    protected $primaryKey = 'id';

    public $timestamps = false;
    protected $hidden = [
        
    ];
    ///// one to one relations between users ////
    public function subject(): BelongsTo
    {

        return $this -> belongsto('App\Models\Subject','subject_id');
    }
   
  
}
