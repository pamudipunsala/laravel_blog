<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name', 
        'description',
        'meta_title', 
        'image',  
        'meta_description', 
        'meta_keyword', 
        'navbar_status', 
        'status', 
        'created_by'
    ];
}