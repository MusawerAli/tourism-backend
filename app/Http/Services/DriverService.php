<?php
namespace App\Http\Services;

use App\Http\Resources\DriverResource;;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class DriverService extends Config
{

    public function store($request){
        DB::beginTransaction();
        $data =  $request->all();
        $data['password'] = Hash::make('12345678');
        $insert_data = $this->getUserModel()->create($data);
        $insert_data->assignRole(['driver']);
        $this->getdriverModel()->create(['passanger_id'=>$insert_data->id]);
        DB::commit();
        return $this->jsonSuccessResponse('successfully created',$insert_data);
        }

        public function index(){
            return $this->jsonSuccessResponse('successfully retrieve',$this->getdriverModel()->with('passanger')->get());
        }

        public function show($uuid){
            return $this->jsonSuccessResponse('successfully retrieve',$this->getdriverModel()->getByColVal('passanger_uuid',$uuid)->first());
        }

        public function update($request,$uuid){
            $inputs = $request->except('email','role_id');

            $user = $this->getUserModel()->getByColVal('user_uuid',$uuid)->first();
            $user->name = $inputs['name'];
            $user->sure_name = $inputs['sure_name'];
            $user->save();
            return $this->jsonSuccessResponse('successfully Updated',$user);

        }

        public function archive($request,$uuid){
            $inputs = $request->all();
            $user = $this->getUserModel()->getByColVal('user_uuid',$uuid)->first();
            $user->active = ($inputs['status']=="")?0:1;
            $user->save();
            return $this->jsonSuccessResponse('successfully Updated',$this->getdriverModel()->get());

        }



}

?>
