@extends('layouts.app')
@section('content')
    <div class="w3agile bus-midd container">

        <div class="table-responsive">
            <table class="table table-bordered agileinfo">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Bus Plate</th>
                    <th>Depart</th>

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
                        <td class="wthree"><i class="fa fa-clock-o"></i>{{$trip->departure}}</td>
                        <td class="wthree">{{$trip->arrival}}</td>
                        <td class="wthree">{{$trip->capacity}}</td>


                        <td class="price us">
                            @if($trip->capacity>0)
                                <form action="{{route('store.ticket')}}" method="post">
                                    @csrf
                            <div class="Book">
                                <button type="submit" name="trip" value="{{$trip->id}}">Book</button>
                            </div>
                                </form>


                        @else

                            <div class="Book-disable">
                                <button type="submit" data-toggle="modal" data-target="#myModalbook" disabled  >Book </button>
                            </div>

                        @endif
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $('#origin_id').change(function (){
            let val = $(this).val()
            let url = '{{ route('get.city') }}'+'/' + val;
            axios.get(url).then(function (msg){
                $('#city_id').html(msg.data)
            })
        })
    </script>
    <script>

    </script>
@endpush
