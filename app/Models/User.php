<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    ### Relations
    public function notificationFrom()
    {
        return $this->hasMany(   Notification::class, 'from_user_id');
    }

    public function notificationTo()
    {
        return $this->hasMany(Notification::class, 'to_user_id');
    }

    public function countNotIsSeenScope($query)
    {
        return $query->whereHas('notificationTo',function ($query)
        {
            return $query->where('is_seen',-1)->get();
        });
    }
}
