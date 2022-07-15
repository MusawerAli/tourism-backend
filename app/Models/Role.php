<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use \BinaryCabin\LaravelUUID\Traits\HasUUID;
    use HasFactory;
    protected $uuidFieldName = 'role_uuid';
    protected $table = 'roles';
    protected $fillable = ['role_name'];
    public $timestamps = true;
}
