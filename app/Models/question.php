<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'question_title',
        'mark',
        'option_one',
        'option_two',
        'option_three',
        'option_four',
        'answer_option',
        'category_id',
        'chapter_id',
        'subject_id',
    ];
    protected $hidden = [

    ];
 
    public function category(): BelongsTo
    {

        return $this -> belongsto('App\Models\Category','category_id');
    }

    ///////meme
    public function chapter(): BelongsTo
    {

        return $this -> belongsto('App\Models\Chapter','chapter_id');
    }

    public function subject(): BelongsTo
    {
        return $this -> belongsto('App\Models\Subject','subject_id');
    }

}
