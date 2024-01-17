<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'mobile_number', 'department', 'gender', 'status', 'address'
    ];

    protected $table = 'trainers';

    

    
}
