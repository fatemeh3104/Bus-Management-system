@extends('layouts.app')
@section('content')
    <div class="w3agile contact container">
        <h3 class="w3ls-title2">Online Bus Tickets Booking with Zero Booking Fees</h3>
        <div class="book-a-ticket">
            <div class=" bann-info">
                <form action="{{route('BusManagement.Show')}}" method="get">
                    <div class="ban-top">
                        <div class="bnr-left">
                            <label class="inputLabel">From</label>
{{----}}
                            <select class="" id="origin_id" name="from" aria-label="Default select example">
                                <option value="">Please select one...</option>
                            @foreach($trips as $trip)
                                    <option value="{{$trip->origin}}">{{$trip->origin}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="bnr-left">
                            <label class="inputLabel">To</label>
                            <select class="" id="city_id" name="to" aria-label="Default select example">

                            </select>                        </div>
                        <div class="clearfix"></div>
                    </div>



                    <div class="search">
                        <input type="submit" value="Search">

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $('#origin_id').change(function (){
            let val1 = $(this).val();
            let url1 = '{{ route('get.city') }}'+'/' + val1;
            console.log(url1);
            axios.get(url1).then(function (msg){
                $('#city_id').html(msg.data)
            })
        })
    </script>
@endpush
