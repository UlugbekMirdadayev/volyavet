<?php

namespace App\Models;

use App\Services\BranchService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = ['id', 'status', 'title', 'description'];

    public function getImage(): string
    {
        if ($this->getMedia()->first() === null) {
            return "../../img/servicesAndPrice.jpg";
        } else {

        return $this->getMedia()->first()->getUrl();
        }
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'categories_id')->select('id', 'title', 'categories_id', 'branch_id', 'price');
    }

}
