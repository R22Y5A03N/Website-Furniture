<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'dimensions',
        'material',
        'color',
        'features',
        'warranty',
        'is_featured'
    ];
}