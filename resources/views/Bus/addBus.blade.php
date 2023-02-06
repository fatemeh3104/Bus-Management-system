@extends('layouts.app')
@section('content')
    <div class="container">
    <h1 >Add Bus :  </h1>
    </div>
<form class="container" action="{{route('store.bus')}}" method="post">
    @csrf
    @include('section.errore')
    <div class="form-row row mt-3 ">
        <div class="form-group col-md-6">
            <label for="plate">Plate </label>
            <input type="text" class="form-control " name="plate" id="plate">
        </div>
        <div class="form-group col-md-6">
            <label for="capacity">Capacity </label>
            <input type="number" name="capacity" class="form-control " id="capacity">
        </div>
    </div>
    <div class="Book mt-5">
        <button type="submit" class="btn">Add Bus</button>
    </div>

</form>
@endsection
