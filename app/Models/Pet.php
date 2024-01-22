<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pet extends Model
{

    protected $fillable = [
        'type',
        'breed',
        'nickname',
        'sex',
        'dateBirth',
        'user_id',
        'pet_crm_id',
    ];

    protected $casts = [
        'dateBirth' => 'datetime',
    ];

    // Мутатор для поля "sex"
//    public function getSexAttribute($value): string
//    {
//        return PetSexStatusEnum::getStatus($value);
//    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
