<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'event_date',
        'status',
        'category',
    ];

    public function scopeUmum($query)
    {
        return $query->where('category', 'umum');
    }

    public function scopeErfan($query)
    {
        return $query->where('category', 'erfan');
    }

    // Relasi: satu gallery memiliki banyak gambar
    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }
}
