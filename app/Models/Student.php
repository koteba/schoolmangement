<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $primaryKey = 'student_id';
    protected $fillable = [
        'name',
        'birth_date',
        'address',
        'picture',
        'classes_id',
     
    ];
}
