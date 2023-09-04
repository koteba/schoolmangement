<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $primaryKey = 'advertisement_id';
    protected $fillable = [
        'title',
        'sub_title',
        'dec_1',
        'dec_2',
        'dec_3',
        'dec_4',
        'dec_5',
    ];
}
