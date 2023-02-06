@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('store.trip')}}" method="post">
            @csrf
            @include('section.errore')
            <div class="form-row row">
                <div class="form-group col-md-6">
                    <label for="selectOrigin">From</label>
                    <select class="form-select" name="origin" id="selectOrigin">
                        <option>Open this select menu</option>

                        @foreach($cities as $city)
                            <option {{$city->city}}>{{$city->city}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="selectDestination">To</label>
                    <select class="form-select" id="selectDestination" name="destination"
                            aria-label="Default select example">
                        <option value="{{$city->city}}">Open this select menu</option>

                        @foreach($cities as $city)
                            <option value="{{$city->city}}">{{$city->city}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="selectCityInRay">City in ray</label>
                <select class="form-selec js-example-basic-multiple form-select" id="selectCityInRay" name="cityInRay[]"
                        multiple="multiple">

                    @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->city}}</option>
                    @endforeach
                </select>

            </div>


            {{-------------------------------}}
            <div class="form-row row mt-3 ">
                <div class="form-group col-md-6">
                    <label for="Capacity">Capacity </label>
                    <input type="number" class="form-control " name="capacity" id="Capacity">
                </div>
                <div class="form-group col-md-6">
                    <label for="Date">Date </label>
                    <input type="date" name="Date" class="form-control " id="Date">
                </div>
            </div>
            <div class="form-row row mt-3">
                <div class="form-group col-md-6">
                    <label for="departure">Moving Time</label>
                    <input type="time" name="departure" class="form-control " id="departure">
                </div>
                <div class="form-group col-md-6">
                    <label for="arrival">Arriving time </label>
                    <input type="time" name="arrival" class="form-control " id="arrival">
                </div>
            </div>
            <div class="row">
                <div class="form-group  col-md-6">
                    <label for="Driver">Driver</label>
                    <select class="form-select" id="Driver" name="driver" aria-label="Default select example">
                        <option>Open this select menu</option>

                        @foreach($drivers as $driver)
                            <option value="{{$driver->id}}">{{$driver->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group  col-md-6">
                    <label for="bus">Bus</label>
                    <select class="form-select" id="bus" name="bus_id" aria-label="Default select example">

                    </select>
                </div>
            </div>
            <div class="Book mt-3">
                <button type="submit" class="btn">Add Trip</button>
            </div>

        </form>
    </div>

@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script>
        $('#Date').change(function (){
            let val = $(this).val();
            let url = '{{ route('get.bus') }}'+'/' + val;
            console.log(url);
            axios.get(url).then(function (msg){
                $('#bus').html(msg.data)
            })
        })
    </script>

{{--    <script>--}}
{{--        $('#Date').change(function (){--}}
{{--            let val1 = $(this).val();--}}
{{--            let url1 = '{{ route('get.driver') }}'+'/' + val1;--}}
{{--            console.log(url1);--}}
{{--            axios.get(url1).then(function (msg){--}}
{{--                $('#Driver').html(msg.data)--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}
@endpush
