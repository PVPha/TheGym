<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassList extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'trainer_id',
        'trainer_name',
        'class_name',
        'room',
        'date_of_week',
        'start_time',
        'end_time',
        'start_date',
        'end_date',
    ];
}