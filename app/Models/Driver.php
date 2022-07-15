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

    public function getByColVal($col,$val){
        return $this->where($col,$val)->with('creater');
    }
}
