<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferStoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            "driver_id"=>"required|exists:drivers,id",
            "passanger_id"=>"required|exists:users,id",
            "vehicle_id"=>"required|exists:vehicles,id",
            "starting_point"=>"required",
            "ending_point"=>"required|",
            "departure_time"=>"required",
            "departure_date"=>"required"
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
                'driver_id.required' => 'Driver id required',
                'driver_id.exists' => 'Driver not found',
                'vehicle_id.required' => 'Vehicle id required',
                'vehicle_id.exists' => 'Vehicle not found',
                'passanger_id.required' => 'Passanger id required',
                'passanger_id.exists' => 'Passanger not found',
                'starting_point.required' => 'Starting point is required',
                'ending_point.required' => 'Ending point is required',
                 'departure_date.required' => 'Departure date is required',
            ];
        }
}
