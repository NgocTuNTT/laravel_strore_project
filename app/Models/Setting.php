<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'setting';
    protected $fillable = [
        'title',
        'textColor',
        'buttonColor',
        'backgroundColor',
        'email1',
        'email2',
        'email3',
        'phone1',
        'phone2',
        'phone3',
        'address1',
        'address2',
        'address3',
        'facebook',
        'youtube',
        'instagram',
    ];
}


