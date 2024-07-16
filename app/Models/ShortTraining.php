<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortTraining extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'attendence_type',
        'trainees',
        'college',
        'location',
        'training_name',
        'venue',
        'date',
        'endOfRegistration',
        'software',
    ];
}
