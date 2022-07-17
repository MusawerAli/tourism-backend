<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use \BinaryCabin\LaravelUUID\Traits\HasUUID;
    use HasFactory;
    protected $uuidFieldName = 'transfer_uuid';
    protected $table = 'transfers';
    protected $fillable = ['creater_id','driver_id','passanger_id','vehicle_id','starting_point','ending_point','status','departure_time','departure_date','end_time'];
    public $timestamps = true;


    public function creater(){
        return $this->hasOne(User::class, 'id', 'creater_id');
    }

    public function vehicle(){
        return $this->hasOne(Vehicle::class, 'id', 'vehicle_id');
    }

    public function passanger(){
        return $this->hasOne(User::class, 'id', 'passanger_id');
    }

    public function driver(){
        return $this->hasOne(User::class, 'id', 'driver_id');
    }

    public function getByColVal($col,$val){
        return $this->where($col,$val)->with(
            [
            'creater:id,user_uuid,name,mobile_number,city',
            'passanger:id,user_uuid,name,mobile_number,city',
            'driver:id,user_uuid,name,mobile_number,city',
            'vehicle'
            ]
        );
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
