<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    // Define which fields can be mass-assigned
    protected $fillable = [
        'title',
        'date',
        'details',
        'link',
    ];
    const tableName = 'notice';
}
