<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Requests\DriverStoreRequest;
use Illuminate\Http\Request;

class DriverController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return $this->getDriverService()->index();
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
    public function store(DriverStoreRequest $request)
    {
        try {
            return $this->getDriverService()->store($request);
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
            return $this->getDriverService()->show($uuid);
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
    public function update(Request $request,$uuid)
    {
        try {
            return $this->getDriverService()->update($request,$uuid);
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
            return $this->getDriverService()->archive($request,$uuid);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e], 500);
        }
    }
}
