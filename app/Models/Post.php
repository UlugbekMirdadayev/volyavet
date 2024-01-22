<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = [
        'h1',
        'description',
        'title',
        'body',
        'image'
    ];

    public function getImage() {
        return $this->getMedia()->first()->getUrl();
    }
    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('d.m.y');
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->acceptsMimeTypes(['image/jpeg', 'image/png']);
//            ->maxFilesize(2 * 1024 * 1024); // ограничение размера файла в 2 МБ
    }
}
