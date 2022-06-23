@extends('layouts.appme')

@section('content')
<div class="container">
    @include('inc.messages')
    <div class=" container w-80 display-6  d-flex justify-content-between">
        <a href="/bar" class="btn btn-dark">&laquo; Back</a>
    </div>
    <br>
    <div class="col-sm">
        <div class="card mb-4 box-shadow ">
            <div class="card-header bg-primary text-white">
              <h4 class="my-0 font-weight-normal">Edit Bar Of Gold</h4>
            </div>
            <div class="card-body">
                <form action="{{route('bar.store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label for="countryname">karat</label>
                        <input type="text" class="form-control" name="karat" placeholder="" value="{{$bar->karat}}">
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
