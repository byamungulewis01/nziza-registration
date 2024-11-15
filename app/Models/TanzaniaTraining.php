<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanzaniaTraining extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'software',
        'start_date',
        'end_date',
        'price',
        'virtual_price',
        'location',
        'instructor',
        'allowed_professions',
    ];
    protected $casts = [
        'allowed_professions' => 'array',
    ];
}
