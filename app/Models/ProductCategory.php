<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $Category = 'product_categories';

    protected $fillable = [
        'category_name',
    ];

    
}
