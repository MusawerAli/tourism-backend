<?php

namespace App\Http\Services;

use App\Models\User;
use App\Http\TraitHelper\CommonServices;
use App\Models\Passanger;
use App\Models\Driver;
use App\Models\Role;
use App\Models\Transfer;
use App\Models\Vehicle;
class Config {
    use \App\Http\TraitHelper\CommonServices;
    public function getUserModel(){
        return new User;
    }

    public function getdriverModel(){
        return new Driver();
    }

    public function getTransferModel(){
        return new Transfer();
    }

    public function getPassangerModel(){
        return new Passanger();
    }
    public function getVehicleModel(){
        return new Vehicle();
    }
    public function getRoleModel(){
        return new Role();
    }
}

?>
