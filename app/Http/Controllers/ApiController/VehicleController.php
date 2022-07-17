<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Requests\VehicleEditStoreRequest;
use App\Http\Requests\VehicleStoreRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class VehicleController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return $this->getVehicleService()->index();
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleStoreRequest $request)
    {
        try {
            return $this->getVehicleService()->store($request);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e], 500);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        try {
            return $this->getVehicleService()->show($uuid);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleEditStoreRequest $request,$uuid)
    {
        try {
            return $this->getVehicleService()->update($request,$uuid);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function archive(Request $request,$uuid)
    {
        try {
            return $this->getVehicleService()->archive($request,$uuid);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e], 500);
        }
    }
}
