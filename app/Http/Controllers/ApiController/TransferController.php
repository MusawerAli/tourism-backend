<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Requests\TransferEditRequest;
use App\Http\Requests\TransferStoreRequest;
use App\Http\Requests\TransferUpdateRequest;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TransferController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            return $this->getTransferService()->index($request);
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
    public function store(TransferStoreRequest $request)
    {
        try {
            return $this->getTransferService()->store($request);
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
            return $this->getTransferService()->show($uuid);
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
    public function update(TransferUpdateRequest $request,$uuid)
    {
        try {
            return $this->getTransferService()->update($request,$uuid);
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
    public function updateStatus(Request $request,$uuid)
    {
        try {
            return $this->getTransferService()->updateStatus($request,$uuid);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e], 500);
        }
    }

}
