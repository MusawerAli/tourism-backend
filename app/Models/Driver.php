<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use \BinaryCabin\LaravelUUID\Traits\HasUUID;
    use HasFactory;
    protected $uuidFieldName = 'driver_uuid';
    protected $table = 'drivers';
    protected $fillable = ['creater_id','driver_id'];


    public function creater(){
        return $this->hasOne(User::class, 'id', 'creater_id');
    }
    public function user(){
        return $this->hasOne(User::class,'id','driver_id');
    }

    public function getByColVal($col,$val){
        return $this->where($col,$val)->with('creater');
    }
    public function getAllDriver(){
        return $this->with(['user:id,name,sure_name,email,city,active,mobile_number,user_uuid'])->get();
    }
    public function updateByColVal($col, $val, $data) {

        return $this->where($col, $val)->update($data);
    }

    public static function boot() {
        parent::boot();
        self::creating(function ($model) {
            $model->creater_id = auth()->user()->id;
        });
    }
}
