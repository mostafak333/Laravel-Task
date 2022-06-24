@extends('layouts.appme')

@section('content')

<div class="container">
    @include('inc.messages')
    <div class=" container w-80 display-6  d-flex justify-content-between">
        <a href="/location" class="btn btn-dark">&laquo; Back</a>
    </div>
    <br>
    <div class="card mb-4 box-shadow ">
        <div class="card-header bg-primary text-white">
            <h4 class="my-0 font-weight-normal">Edit Location</h4>
        </div>
        <div class="card-body">
            <form action="{{route('location.update',$location->id)}}" method="POST">
                <input name="_method" type="hidden" value="PUT">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="countryname">Country Name</label>
                        <input type="text" class="form-control" name="locationname" placeholder=""
                            value="{{$location->country}}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="governorate">Governorate</label>
                        <input type="text" class="form-control" name="governorate" placeholder=""
                            value="{{$location->governorate}}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" placeholder=""
                            value="{{$location->address}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
@endsection
