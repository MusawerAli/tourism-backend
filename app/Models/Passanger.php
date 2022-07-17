<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passanger extends Model
{
    use \BinaryCabin\LaravelUUID\Traits\HasUUID;
    use HasFactory;
    protected $uuidFieldName = 'passanger_uuid';
    protected $table = 'passangers';
    protected $fillable = ['creater_id','passanger_id'];


    public function creater(){
        return $this->hasOne(User::class, 'id', 'creater_id');
    }

    public function passanger(){
        return $this->hasOne(User::class, 'id', 'passanger_id');
    }
    public function getByColVal($col,$val){
        return $this->where($col,$val)->with('creater','passanger');
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
