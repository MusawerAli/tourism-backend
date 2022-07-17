<?php
namespace App\Http\Services;

use App\Http\Resources\AuthResource;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Client as OClient;
use Spatie\Permission\Models\Role;

class AuthService extends Config
{
    public function login($request){
    config(['auth.guards.api.driver' => 'session']);
    if (Auth::guard('api')->attempt(['email' => request('email'), 'password' => request('password')])) {
        $user = Auth::guard('api')->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();
        $data['access_token'] = $tokenResult->accessToken;
        $data['user'] = $user;
        return new AuthResource($data);
    }else{

            return response()->json(['failed'=>'Incorrect username or password'], 401);
        }
    }




    public function register($request){
         $input = $request->all();

         if($input['role']=='admin'){
            $role_id=1;
        }elseif($input['role']=='shopkeeper'){
            $role_id=2;
        }else{
            $role_id=2;
        }

        $data = [
          'email' => $input['email'],
            'name' => $input['name'],
            'password' => Hash::make($input['password']),
            'role_id' => $role_id,
            'ip_address' => '127.0.0.1',
            'cnic' => '3120249677897',
            'isActive' => 1,
            'contact' => '0333112312'
        ];

        if($this->getUserModel()->create($data)){
            $this->getCommonService()->sendMail($input['email'],'signup-verification','Account Verification',$data);
            return response()->json(['success'=>'UserRegister Successful'], 200);
           }

        }



}

?>
