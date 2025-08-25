<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Add all the fields you want to allow mass assignment for
    protected $fillable = [
        'title',
        'venue',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'short_description',
        'long_description',
        'feature_image',
    ];
    const tableName = 'events';
}
