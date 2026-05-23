<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'gallery_id',
        'type',
        'image_path',
        'thumbnail_path',
        'video_url',
        'caption',
    ];

    public function isVideo(): bool
    {
        return $this->type === 'video';
    }

    public function isLocalVideo(): bool
    {
        return $this->type === 'video' && !$this->video_url && $this->image_path;
    }

    public function isYoutubeVideo(): bool
    {
        return $this->type === 'video' && (bool) $this->video_url;
    }

    public function getYoutubeEmbedUrl(): ?string
    {
        if (!$this->video_url) return null;
        // Support: watch?v=ID, watch?si=...&v=ID, youtu.be/ID, shorts/ID
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/|youtube\.com/shorts/)([a-zA-Z0-9_-]{11})%i', $this->video_url, $matches);
        return isset($matches[1]) ? 'https://www.youtube.com/embed/' . $matches[1] : null;
    }

    // Relasi: gambar ini milik satu galeri
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
