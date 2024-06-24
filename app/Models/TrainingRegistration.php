<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingRegistration extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'attendence_type',
        'professional',
        // 'university',
    ];
}
