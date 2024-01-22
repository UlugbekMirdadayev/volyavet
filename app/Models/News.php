<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class News extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['title', 'h1','description', 'content', 'order', 'image', 'branch_id'];

    public function getSortableField(): string
    {
        return 'order';
    }
    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('d.m.y');
    }
    public function getImage() {
        return $this->getMedia()->first()?->getUrl();
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->acceptsMimeTypes(['image/jpeg', 'image/png']);
//            ->maxFilesize(2 * 1024 * 1024); // ограничение размера файла в 2 МБ
    }
}
