<?php
namespace App\Http\Services;

use App\Http\Resources\AuthResource;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthService extends Config
{
    public function login($request){
        $user = User::query()->where([['email', $request->email]])->first();
        if (!$user) {
            return response()->json(['failed'=>'Incorrect Email'], 401);
        }
        if (! Hash::check($request->password, $user->password)) {
            return response()->json(['failed'=>'Incorrect Password'], 401);
        }
        $data['access_token'] = $user->createToken(time())->plainTextToken; //$tokenResult->accessToken;
        $data['user'] = $user;
        return new AuthResource($data);
     }




    public function register($request){

        }



}

?>
