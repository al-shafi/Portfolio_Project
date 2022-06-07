<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewEmployee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'dob', 'gender', 'photo', 'salary', 'address', 'country', 'status'
    ];
    
}
