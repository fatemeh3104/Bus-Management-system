<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Trip;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BusManagementController extends Controller
{
    public function index(){
        $trips = Trip::groupBy('origin')->selectRaw('count(*) as total, origin')
            ->get();

        return view('Bus.index',compact('trips'));
    }

    public function Show(Request $request){
        $from = $request->get('from');
        $to = $request->get('to');
        $date = Carbon::now()->format('d-m-Y');
        $trips = Trip::query()
            ->where('origin',$from)
            ->where('destination',$to)
            ->where('Date','>=',$date)->get();

        return view('Bus.ticket',compact('trips'));
    }
}
