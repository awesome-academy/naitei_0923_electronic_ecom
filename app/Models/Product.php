<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'sold_quantity',
        'status',
        'stock_quantity',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }

    public function images()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
