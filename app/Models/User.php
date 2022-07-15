<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use \BinaryCabin\LaravelUUID\Traits\HasUUID;
    use HasApiTokens, HasFactory, Notifiable;
    protected $uuidFieldName = 'user_uuid';
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'creater_id',
        'name',
        'email',
        'password',
        'sure_name',
        'password',
        'city',
        'role_id'
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

    public function transfers(){
        return $this->hasMany(Transfer::class, 'creater_id', 'id');
    }
    public function vehicle(){
        return $this->hasMany(Vehicle::class, 'creater_id', 'id');
    }
    public function passanger(){
        return $this->hasMany(Passanger::class, 'creater_id', 'id');
    }
    public function driver(){
        return $this->hasMany(Driver::class, 'creater_id', 'id');
    }
}
