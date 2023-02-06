@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>TRAVELER HOME!</h1>

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
                        <th>Seat Number</th>
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
                            <td class="wthree">{{$trip->seatNum}}
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
