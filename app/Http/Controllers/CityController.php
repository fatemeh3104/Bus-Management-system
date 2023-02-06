<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCity($name){
        $date = Carbon::now()->format('d-m-Y');
        $cities = Trip::query()->where('origin',$name)
            ->where('Date','>=',$date)
            ->where('capacity','>',0)->groupBy('destination')->selectRaw('count(*) as total, destination')
            ->get();
        $value = '<option value="">Please select one...</option>';
        foreach ($cities as $city){
            $value .= '<option value="'.$city->destination.'">'.$city->destination.'</option>';
        }
        return $value;
    }
}
