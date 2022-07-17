<?php

namespace App\Http\TraitHelper;

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
        return response()->json($response, $code);
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
        return response()->json($response, $code);
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
        return response()->json($response, $code);
    }
}
