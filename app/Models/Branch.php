<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $email
 * @property string $phone
 * @property string $work_time
 * @property string $title
 * @property string $address
 * @property string $metro
 * @property boolean $is_active
 * @property string $telegram
 * @property string $viber
 * @property string $whats_up
 * @property float $lat
 * @property float $long
 */
class Branch extends Model
{
    use HasFactory;

    protected $table = 'branch';

    protected $fillable = [
        'title',
        'address',
        'work_time',
        'email',
        'phone',
        'metro',
        'is_active',
        'lat',
        'long',
        'telegram',
        'viber',
        'whats_up'
    ];
}
