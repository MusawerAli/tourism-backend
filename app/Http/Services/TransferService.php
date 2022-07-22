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

        public function index($request){
            $search_params = $this->prepareSearchParams($request->all());
            return $this->jsonSuccessResponse('successfully retrieve',$this->getTransferModel()->getTransfers($search_params));
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

            /**
     * prepareSearchParams method
     * prepares search params for get items
     * @param type $request_params
     * @return type
     */
    public function prepareSearchParams($request_params)
    {
        $search_params = [];
        $search_params['driver_uuid'] = $request_params['driver_uuid'] ?? '';
        $search_params['passanger_uuid'] = $request_params['passanger_uuid'] ?? '';
        $search_params['status'] = $request_params['status'] ?? '';
        return $request_params;
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
