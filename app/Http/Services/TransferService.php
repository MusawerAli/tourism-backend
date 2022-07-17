<?php
namespace App\Http\Services;

use App\Http\Resources\TransferResource;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TransferService extends Config
{

    public function store($request){
        DB::beginTransaction();
        $data =  $request->all();
        $insert_data = $this->getTransferModel()->create($data);
        DB::commit();

        return $this->jsonSuccessResponse('successfully created',$insert_data->with(['driver:id,user_uuid,name,mobile_number,city','creater:id,user_uuid,name,mobile_number,city','passanger:id,user_uuid,name,mobile_number,city'])->first());
        }

        public function index(){
            return $this->jsonSuccessResponse('successfully retrieve',$this->getTransferModel()->with(
                [
                'driver:id,user_uuid,name,mobile_number,city',
                'creater:id,user_uuid,name,mobile_number,city',
                'passanger:id,user_uuid,name,mobile_number,city',
                'vehicle'
                ]
                )->get());
        }

        public function show($uuid){
            return $this->jsonSuccessResponse('successfully retrieve',$this->getTransferModel()->getByColVal('transfer_uuid',$uuid)->first());
        }

        public function update($request,$uuid){
            $update = $this->getTransferModel()->updateByColVal('transfer_uuid',$uuid,$request->all());
            if(!$update){
                    return $this->jsonErrorResponse('Some things went wrong');
            }
            // $user->name = $inputs['name'];
            // $user->sure_name = $inputs['sure_name'];
            // $user->save();
            return $this->jsonSuccessResponse('successfully Updated',$this->getTransferModel()->with(
                [
                'creater:id,user_uuid,name,mobile_number,city',
                'passanger:id,user_uuid,name,mobile_number,city',
                'driver:id,user_uuid,name,mobile_number,city',
                'vehicle'
                ]
            )->get());

        }

        public function updateStatus($request,$uuid){
            $update = $this->getTransferModel()->updateByColVal('transfer_uuid',$uuid,$request->all());
            if(!$update){
                return $this->jsonErrorResponse('Something went wrong');
            }
            return $this->jsonSuccessResponse('successfully Updated',$this->getTransferModel()->with(
                [
                'creater:id,user_uuid,name,mobile_number,city',
                'passanger:id,user_uuid,name,mobile_number,city',
                'driver:id,user_uuid,name,mobile_number,city',
                'vehicle'
                ]
            )->get());

        }



}

?>
