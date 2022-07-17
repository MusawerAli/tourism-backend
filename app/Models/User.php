<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Passport\HasApiTokens;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use \BinaryCabin\LaravelUUID\Traits\HasUUID;
    use HasApiTokens, HasFactory, Notifiable,HasRoles;
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
        'role_id',
        'mobile_number'
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
    public function role(){
        return $this->hasMany(Role::class,'id','role_id');
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

    public function updateByColVal($col, $val, $data) {

        return $this->where($col, $val)->update($data);
    }
    public function getByColVal($col,$val){
        return $this->where($col,$val)->with('role');
    }

    public static function boot() {
        parent::boot();
        self::creating(function ($model) {
            $model->creater_id = auth()->user()->id??null;
        });
    }
}
