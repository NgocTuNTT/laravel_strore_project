<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;


    protected $table = 'product_imgaes';
    protected $fillable = [
        'image',
        'product_id',


    ];
}
