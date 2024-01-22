<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'src'
    ];

    public static $rules = [
        'type' => 'in:whatsapp,telegram,email,address,viber,number,work',
    ];
}
