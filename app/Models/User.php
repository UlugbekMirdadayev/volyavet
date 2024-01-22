<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\MustVerifyMobile;
use App\Interfaces\MustVerifyMobile as IMustVerifyMobile;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'middle_name',
        'acceptMail',
        'crm_user_id',

        'mobile_number',
        'mobile_verified_at',
        'mobile_verify_code',
        'mobile_attempts_left',
        'mobile_last_attempt_date',
        'mobile_verify_code_sent_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'mobile_verify_code',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'number_verified_at' => 'datetime',
        'mobile_verify_code_sent_at' => 'datetime',
        'mobile_last_attempt_date' => 'datetime',
        'acceptMail' => 'boolean',
    ];

    public function canAccessFilament(): bool
    {
        return "barkyd@mail.ru";
    }

    /**
     * Получить полное имя пользователя ФИО. Just call User->fullName;
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->last_name} {$this->name} {$this->middle_name}";
    }

    public function setMobileNumberAttribute($value) : void
    {
        $this->attributes['mobile_number'] = preg_replace('/\D/', '', $value);
    }

    public function fullNameAttribute(): string
    {
        return `${$this->last_name} ${$this->name} ${$this->middle_name}`;
    }

    public function pets() {
        return $this->hasMany(Pet::class)->orderByDesc('created_at');
    }
    public function routeNotificationForNutnetSms() {
        return $this->mobile_number; // Метод должен возвращать номер телефона, на который будет отправлено уведомление.
    }
    static function existPhone($phone) {
        return (bool)self::where('mobile_number', $phone)->first();
    }

}
