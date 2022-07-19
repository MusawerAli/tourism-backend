<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class DriverStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [

                "name"=> "required",
                "sure_name"=> "required",
                "email"=> "required|unique:users,email,".$request->email,
                'mobile_number' => 'required|unique:users,mobile_number,'.$request->vehicle_no,
                "role_id"=> 'required'

        ];
    }

                        /**
         * Get the error messages for the defined validation rules.
         *
         * @return array
         */
        public function messages()
        {
            return [
                'name.required' => 'Name required',
                'email.required' => 'Email required',
                'email.exists' => 'Email is already taken',
                'mobile_number.required' => 'mobile_number required',
                'mobile_number.exists' => 'mobile_number is already taken',
                'role_id.required'=>'Role is required'
            ];
        }
}
