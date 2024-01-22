<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Team extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    protected $fillable = [
        'title',
        'body',
        'description',
        'exp',
        'image',
        'branch_id',
    ];

    public function getImage() {
        return $this->getMedia()->first()->getUrl();
    }
}
