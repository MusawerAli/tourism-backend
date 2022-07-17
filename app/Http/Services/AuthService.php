<?php
namespace App\Http\Services;

use App\Http\Resources\AuthResource;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class AuthService extends Config
{
    public function login($request){
        $user =  $this->getUserModel()->getByColVal('email',$request->email)->first();
        if (!$user) {
            return $this->jsonErrorResponse(['failed'=>'Incorrect Email'], 401);
        }
        if (! Hash::check($request->password, $user->password)) {

            return $this->jsonErrorResponse(['failed'=>'Incorrect Email'], 401);
        }
        $data['access_token'] = $user->createToken(time())->plainTextToken; //$tokenResult->accessToken;
        $data['user'] = $user;
        return new AuthResource($data);
     }




    public function register($request){

        }



}

?>
