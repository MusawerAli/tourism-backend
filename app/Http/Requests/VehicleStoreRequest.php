<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class VehicleStoreRequest extends FormRequest
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
            'name' => 'required',
            'model' => 'required',
            'brand' => 'required',
            'vehicle_no' => 'required',
            'color' => 'required'
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
                'name.required' => 'Name is required',
                'model.required' => 'Model is required',
                'brand.required' => 'Brand is required',
                'name.required' => 'Name is required',
                'vehicle_no.required' => 'vehicle no is required',
                'color.required' => 'Color no is required',
            ];
        }
}
