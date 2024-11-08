<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Instrument extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'instrument_product');
    }

    public function getFirstInstrumentImageUrlAttribute()
    {
        $url = $this->getFirstMediaUrl('instruments');
        $relativePath = parse_url($url, PHP_URL_PATH);
        return $relativePath;
    }
}

