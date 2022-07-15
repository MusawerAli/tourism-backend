<?php
namespace App\Http\Services;

use App\Http\Resources\TransferResource;

use Illuminate\Support\Facades\Auth;

class TransferService extends Config
{

    public function store($request){
        $inputs = $request->all();
    $data = [
        'mill_id' => $inputs['mill_id']??'',
        'mill_uuid' => $inputs['mill_uuid']??'',
        'name' => $inputs['name']??'',
        'passbook' => $inputs['passbook']??'',
        'name' => $inputs['name']??'',
        'father_name' => $inputs['father_name']??'',
        'cnic' => $inputs['cnic']??'',
        'contact' => $inputs['contact']??'',
        'city' => $inputs['city']??'',
        'source' => $inputs['source']??'',
        'user_uuid' => Auth::user()->user_uuid,
        'user_id' => Auth::user()->id
    ];

    $insert_data = $this->getTransferModel()->create($data);
    return response()->json(['data'=>$insert_data],200);
    }

    public function getDrivers(){

        return TransferResource::collection($this->getTransferModel()->getByColVal('user_id',Auth::user()->id)->get());

    }



}

?>
