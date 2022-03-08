<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = [
        'category_name_en',
        'category_name_kh',
        'category_slug_en',
        'category_slug_kh',
        'category_icon'
    ];
}
