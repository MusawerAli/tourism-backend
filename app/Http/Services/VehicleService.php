<?php
namespace App\Http\Services;

use App\Http\Resources\VehicleResource;
use Illuminate\Support\Facades\Auth;

class VehicleService extends Config
{

    public function store($request){
    $inputs = $request->all();
    $inputs['creater_id'] =Auth::user()->id;
    dd($inputs);
    $insert_data = $this->getVehicleModel()->create($inputs);
    return $this->jsonSuccessResponse('successfully created',$insert_data);
    }
    public function index(){

    }

    public function getDrivers(){

        return VehicleResource::collection($this->getVehicleModel()->getByColVal('user_id',Auth::user()->id)->get());

    }



}

?>
