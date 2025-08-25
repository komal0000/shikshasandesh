<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['type_id', 'file', 'thumb']; // Add necessary fields

    // Relationship to GalleryType
    public function galleryType()
    {
        return $this->belongsTo(GalleryType::class, 'type_id'); // Adjust foreign key if needed
    }
}
