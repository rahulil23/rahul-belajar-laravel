<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class view_data extends Model
{
    protected $table = 'view_data';

    protected $fillable = [
        'product_name',
        'description',
        'price',
        'category_name',
        'product_code',
        'image',
    ];
}
