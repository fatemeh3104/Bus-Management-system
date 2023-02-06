<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorTripRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//    public function authorize()
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'capacity' =>   ["required"],
            'Date' =>       ["required"],
            'destination' =>       ["required"],
            'arrival' =>   ["nullable"],
            'cityInRay' =>  ["required",'array'],
            'origin' =>  ["required"],
            'departure' =>  ["required"],
            'driver'=>['required'],
            'bus_id'=>['required']
        ];
    }

    public function messages()
    {
        return [
            'capacity.required' => 'وارد کردن فیلد مرکز اجباری است',
            'body.required' => 'A message is required',
        ];
    }
}
