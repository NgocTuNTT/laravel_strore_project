<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;



    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'discount',
        'trending',
        'brand',
        'category_id',
        'status',

    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');

    }
    public function productImages(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');

    }
    public function productColors(){
        return $this->hasMany(ProductColor::class, 'product_id', 'id');

    }
}
