@extends('layouts.app')

@section('content')
<div class="container">
<h1>ADMIN HOME!</h1>
    <div class="row  align-content-center addTrip p-3">
        <form class="col-6" action="{{route('add.trip')}}">
            <button type="submit" class="btn m-3 btn-lg align-content-center btn-block">add trip </button>
        </form>
        <form class="col-6" action="{{route('see.buses')}}">
            <button type="submit" class="btn m-3 btn-lg align-content-center btn-block">See Bus </button>
        </form>
    </div>
</div>
<div class="container">
    <div class="w3agile bus-midd container">

        <div class="table-responsive">
            <table class="table table-bordered agileinfo">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Bus Plate</th>
                    <th>Date</th>
                    <th>Origin</th>
                    <th>destination</th>
                    <th>Departure</th>
                    <th>Arrive</th>

                    <th>Capacity</th>

                    <th> Reserve</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trips as $trip)
                    <tr>
                        <th class="t-one" scope="row">{{$loop->iteration}}</th>
                        <td class="wthree"><i class="fa fa-bus" aria-hidden="true"></i> {{$trip->Bus->plate}}</td>
                        <td class="wthree"><i class="fa fa-clock-o"></i>{{$trip->Date}}</td>
                        <td class="wthree">{{$trip->origin}}</td>
                        <td class="wthree">{{$trip->destination}}</td>
                        <td class="wthree">{{$trip->departure}}</td>
                        <td class="wthree">{{$trip->arrival}}</td>
                        <td class="wthree">{{$trip->capacity}}</td>




                        <td class="price us">
                            <div class="Book">
                            <form action="{{route('trip.delete')}}" method="post">
                            @csrf
                            @method('delete')
                                <button type="submit" name="trip_id" value="{{$trip->id}}">Delete</button>
                            </form>
                            </div>

                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-3">{{$trips->links()}}</div>

    </div>


</div>

@endsection
