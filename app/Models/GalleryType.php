<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryType extends Model
{
    use HasFactory;

    protected $fillable = ['icon', 'name'];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'gallery_type_id');
    }
}
