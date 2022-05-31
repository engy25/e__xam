<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'symbol',
        'category_name',
        'created_at',
        'updated_at',
        
    
    ];

    protected $table = "categories";
   

}