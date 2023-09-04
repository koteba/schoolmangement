<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $primaryKey = 'mark_id';
    protected $fillable = [
        'mark',
        'student_id',
        'course_id',
     
    ];
}
