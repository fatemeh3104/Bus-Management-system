@extends('layouts.app')
@section('content')
    <div class="table-responsive container">
        <form action="{{route('add.bus')}}" class="col-12 addTrip p-3">
        <button type="submit"  class="btn m-3 btn-lg align-content-center btn-block">Add Bus </button>
        </form>
        <table class="table table-bordered agileinfo">
            <thead>
            <tr>
                <th>No</th>
                <th>Plate</th>
                <th>Capacity</th>
                <th></th>
            </tr>
            </thead>
      <tbody>
            @foreach($buses as $bus)
                <tr>
                    <th class="t-one" scope="row">{{$loop->iteration}}</th>
                    <td class="wthree"><i class="fa fa-bus" aria-hidden="true"></i> {{$bus->plate}}</td>
                    <td class="wthree"><i class="fa fa-clock-o"></i>{{$bus->capacity}}</td>


                    <td class="price us">

                            <div class="Book">
                                <form action="{{route('bus.delete')}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" name="bus_id"   value="{{$bus->id}}">Delete</button>
                                </form>

                            </div>

                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">{{$buses->links()}}</div>

    </div>
@endsection
