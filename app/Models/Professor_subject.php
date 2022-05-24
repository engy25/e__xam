<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\User;
class Professor_subject extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'professor_id',
        'subject_id' 	
        
    
    ];

    public $timestamps = false;
   

    public function professor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'professor_id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
