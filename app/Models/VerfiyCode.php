<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerfiyCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'code',
        'phone_number',

    ];
}
