<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory , SoftDeletes;


    protected $fillable =
        [
            'title',
            'slug',
            'price',
            'url_image',
            'description',
            'category_id',
            'SoftDeletes'
        ];

    protected $dates = ['deleted_at'];


    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
