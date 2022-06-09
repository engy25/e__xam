<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Result extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'exam_id',
        'result',
       ];
       public $timestamps = false;
 protected $primaryKey = 'id';

    public function online_exam(): BelongsTo
    {

        return $this -> belongsto('App\Models\Online_exam','exam_id');
    }

    public function user():BelongsTo
    {
       

       return $this->belongsTo(User::class,'user_id');
     
    }
  
}
