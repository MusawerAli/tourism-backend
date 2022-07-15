<?php

namespace App\Http\TraitHelper;

use Illuminate\Support\Facades\Response;
trait CommonServices
{

    /**
     * jsonSuccessResponse method
     * @param type $msg
     * @param type $data
     * @param type $code
     * @return type
     */
    public function jsonSuccessResponse($msg, $data = [], $code = 200) {
        $response = [];
        $response['success'] = true;
        $response['data'] = $data;
        $response['message'] = $msg;
        $response['status_code'] = $code;
        return Response::json($response);
    }

    /**
     * jsonErrorResponse method
     * @param type $error
     * @param type $code
     * @return Response
     */
    public function jsonErrorResponse($error, $code = 2044) {
        $response = [];
        $response['success'] = false;
        $response['message'] = $error;
        $response['status_code'] = $code;
        return Response::json($response);
    }

        /**
     * jsonSuccessResponseWithoutData method
     * @param type $msg
     * @return type
     */
    public function jsonSuccessResponseWithoutData($msg, $code = 200) {
        $response = [];
        $response['success'] = true;
        $response['message'] = $msg;
        $response['status_code'] = $code;
        return Response::json($response);
    }
}
