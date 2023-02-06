<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBusRequest;
use App\Http\Requests\StorTripRequest;
use App\Models\Bus;
use App\Models\cities;
use App\Models\CityInRay;
use App\Models\Trip;
use App\Models\Trip_User;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = auth()->user();
        $trips = Trip::paginate(6);

        if ($user->Type_id==1){
            return view('Bus.Home.adminHome',compact('user'),compact('trips'));
        }
        elseif ($user->Type_id==2){
            $trips = Trip::join('trip__users','trips.id','=','trip__users.trip_id')
                ->where('trip__users.user_id','=',$user->id)
                ->paginate('3');
            return view('Bus.Home.driverHome',compact('trips'));
        }
        else{
            $trips = Trip::join('trip__users','trips.id','=','trip__users.trip_id')
                ->where('trip__users.user_id','=',$user->id)
                ->paginate(5);
            return view('Bus.Home.traveler',compact('trips'));
        }


    }
    public function test()
    {
        $cities = cities::get();
        $drivers= User::query()->where('Type_id','=','2' )->get();
        //$buses =Bus::join('trips','trips.bus_id','=','buses.id')->where('bus_id','=','5')->get();

        return view('Bus.addTrip',compact('cities','drivers'));
    }
    public function storeTrip(StorTripRequest $request){
        try {
            $trip = new Trip();
            $data = $request->validated();
//        dd($data);
            $citis = $data['cityInRay'];
            if (isset($data['cityInRay'])){

                unset($data['cityInRay']);
            }
            $driver=$data['driver'];

            if (isset($data['driver'])){
                unset($data['driver']);
            }

            foreach ($data as $key=>$item){
                $trip->$key = $item;
            }
            $trip->save();
            foreach ( $citis as $city){
                $data = new CityInRay();
                $data->trip_id = $trip->id;
                $data->city_id = $city;
                $data->save();
            }
            $data1 = new Trip_User();
            $data1->trip_id =$trip->id;
            $data1->user_id = $driver;
            $data1->seatNum = 0;
            $data1->save();
        }catch (\Exception $e){
            dd($e->getMessage());
        }
return redirect()->route('home');
        //        $cities = cities::get();
//        $drivers= User::query()->where('Type_id','=','2' )->get();
//        $buses =Bus::join('trips','trips.bus_id','=','buses.id')->where('bus_id','=','5')->get();
//
//        return view('Bus.addTrip',compact('cities','drivers','buses'));
    }
    public function addBus()
    {
        return view('Bus.addBus',);
    }

    public function storeBus(StoreBusRequest $request){

        try {
            $bus = new Bus();
            $data = $request-> validated();
            foreach ($data as $key=>$item){
                $bus->$key = $item;
            }

            $bus->save();
            $buses = Bus::paginate(5);

            return view('Bus.buses',compact('buses'));


        }catch (\Exception $e){
            dd($e->getMessage());
        }
    }
    public function seeBuses(){
        $buses = Bus::paginate(5);

        return view('Bus.buses',compact('buses'));

    }
    public function storeTicket(Request $request){
        try {

            $trip_id = $request->input('trip');
            $last_seat =Trip_User::query()->where('trip_id','=',$trip_id)->max('seatNum');

            $user = auth()->user();
            $trip = Trip::query()->where('id','=',$trip_id)->get();

            $trip[0]->update([
                'capacity' => $trip[0]->capacity-1
            ]);
            Trip_User::create([
                'user_id'=>$user->id,
                'trip_id'=>$trip_id,
                'seatNum'=>$last_seat+1
            ]);
            return redirect()->route('home');

        }catch (\Exception $e){
            dd($e->getMessage());
        }
    }

    public function deleteTrip(Request $request){
        $trip_id =$request->input('trip_id');
        $trip = Trip::query()->where('id','=',$trip_id)->get();
        $trip[0]->delete();
        return redirect()->route('home');


    }
    public function deleteBus(Request $request){
        $bus_id =$request->input('bus_id');
        $bus = Bus::query()->where('id','=',$bus_id)->get();

        $bus[0]->delete();
        return redirect()->route('home');

    }

}
