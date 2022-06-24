@extends('layouts.appme')
@section('content')
<div class="container">
    @include('inc.messages')
    <div class=" container w-80 display-6  d-flex justify-content-between">
        <a href="/treasury" class="btn btn-dark">&laquo; Back</a>
    </div>
    <br>
    <div class="col-sm">
        <div class="card mb-4 box-shadow ">

            <div class="card-header bg-primary text-white">
                <h4 class="my-0 font-weight-normal">Add New Treasury</h4>
            </div>
            <div class="card-body">
                <form action="{{route('treasury.store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="status">Status</label>
                            <select id="status" class="form-select" aria-label="Default select example" name="status"
                                required>
                                <option selected value="{{null}}">Select Treasury Status</option>
                                <option value="0">internal</option>
                                <option value="1"> external</option>
                            </select>
                        </div>
                    </div>
                    @php
                    $locations = DB::select('SELECT * From `location`');
                    @endphp
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="location">Location Id</label>
                            <select id="location" class="form-select" aria-label="Default select example"
                                name="locationId" required>
                                @foreach ($locations as $location)
                                <option value="{{$location->id}}">{{$location->id}}
                                    {{$location->country}}->{{$location->governorate}}->{{$location->address}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="weight">Weight Kg</label>
                            <input type="text" class="form-control" name="weight" placeholder="" value="" required>
                        </div>
                    </div>

                    <div class="row align-content-center">
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
