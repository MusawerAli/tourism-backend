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
    protected $fillable = ['creater_id','driver_id','passanger_id','vehicle_id','starting_point','ending_point','status'];
    public $timestamps = true;
}
