<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use \BinaryCabin\LaravelUUID\Traits\HasUUID;
    use HasFactory;
    protected $uuidFieldName = 'vehicle_uuid';
    protected $table = 'vehicles';
    protected $fillable = ['creater_id','name','model','brand','vehicle_no','color','active'];
    public $timestamps = true;
    public function creater(){
        return $this->hasOne(User::class, 'id', 'creater_id');
    }

    public function getByColVal($col,$val){
        return $this->where($col,$val)->with('creater');
    }
}
