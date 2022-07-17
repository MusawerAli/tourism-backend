<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(LoginRequest $request){
        try {
            return $this->getAuthService()->login($request);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e], 500);
        }
    }
}
