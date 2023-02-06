<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Trip;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function getBus($date){

        $buses = Bus::leftjoin('trips','buses.id','=','trips.bus_id')
            ->where('trips.Date','!=',$date)
           ->orwhere('trips.Date','=',null)
            ->groupBy('buses.plate','buses.id')
            ->selectRaw('count(*) as total, buses.plate , buses.id ')
            ->get();

        $value = '<option value="">Please select one...</option>';
        foreach ($buses as $bus){
            $value .= '<option value="'.$bus->id.'">'.$bus->plate.'</option>';
        }
        return $value;

    }
//    public function getDriver($date){
//
//        $drivers = User::leftjoin('trips','users.id','=','trips.user_id')
//            ->where('users.type_id','=','2')
//            ->where('trips.Date','!=',$date)
//            ->orwhere('trips.Date','=',null)
//            ->groupBy('users.name','users.id')
//            ->selectRaw('count(*) as total, users.name , users.id ')
//            ->get();
//
//        $value = '<option value="">Please select one...</option>';
//        foreach ($drivers as $driver){
//            $value .= '<option value="'.$driver->id.'">'.$driver->name.'</option>';
//        }
//        return $value;
//
//    }
}
