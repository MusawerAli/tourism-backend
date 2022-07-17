<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Services\AuthService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Services\DriverService;
use App\Http\Services\PassangerService;
use App\Http\Services\TransferService;
use App\Http\Services\VehicleService;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getAuthService(){
        return new AuthService();
    }
    public function getDriverService(){
        return new DriverService();
    }
    public function getVehicleService(){
        return new VehicleService();
    }
    public function getPassangerService(){
        return new PassangerService();
    }
    public function getTransferService(){
        return new TransferService();
    }
}
