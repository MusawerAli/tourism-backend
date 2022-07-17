<?php
namespace App\Http\Services;

use App\Http\Resources\VehicleResource;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
class VehicleService extends Config
{

    public function store($request){
    $insert_data = $this->getVehicleModel()->create($request->all());
    return $this->jsonSuccessResponse('successfully created',$insert_data);
    }

    public function index(){
        return $this->jsonSuccessResponse('successfully retrieve',$this->getVehicleModel()->all());
    }

    public function show($uuid){
        return $this->jsonSuccessResponse('successfully retrieve',$this->getVehicleModel()->getByColVal('vehicle_uuid',$uuid)->first());
    }

    public function update($request,$uuid){
        $inputs = $request->all();
        $update_vehicle = $this->getVehicleModel()->updateByColVal('vehicle_uuid',$uuid,$inputs);
        if(!$update_vehicle){
            return $this->jsonErrorResponse('Something went wrong',$this->getVehicleModel()->all());
        }
        return $this->jsonSuccessResponse('successfully Updated',$this->getVehicleModel()->all());

    }

    public function archive($request,$uuid){
        $inputs = $request->all();

        $data = [
            'active' => ($inputs['status']=="")?0:1
        ];
        $update_vehicle = $this->getVehicleModel()->updateByColVal('vehicle_uuid',$uuid,$data);
        if(!$update_vehicle){
            return $this->jsonErrorResponse('Something went wrong');
        }
        return $this->jsonSuccessResponse('successfully Updated',$this->getVehicleModel()->all());

    }
}

?>
