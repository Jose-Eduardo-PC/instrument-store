<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Content extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'body',
        'type',
    ];

    public function getFirstContentImageUrlAttribute()
    {
        $url = $this->getFirstMediaUrl('content_images');
        $relativePath = parse_url($url, PHP_URL_PATH);
        return $relativePath;
    }

    public function getFirstContentAudioUrlAttribute()
    {
        $url = $this->getFirstMediaUrl('content_audio');
        $relativePath = parse_url($url, PHP_URL_PATH);
        return $relativePath;
    }
    
    public function getFirstContentVideoUrlAttribute()
    {
        $url = $this->getFirstMediaUrl('content_video');
        $relativePath = parse_url($url, PHP_URL_PATH);
        return $relativePath;
    }
}



