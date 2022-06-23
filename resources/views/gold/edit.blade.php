@extends('layouts.appme')
@section('content')
<div class="container">
    @include('inc.messages')
    <div class=" container w-80 display-6  d-flex justify-content-between">
        <a href="/gold" class="btn btn-dark">&laquo; Back</a>
    </div>
    <br>
    <div class="col-sm">
        <div class="card mb-4 box-shadow ">
            <div class="card-header bg-primary text-white">
              <h4 class="my-0 font-weight-normal">Edit Gold</h4>
            </div>
            <div class="card-body">
                <form action="{{route('gold.update',$gold->id)}}" method="post">
                    <input name="_method" type="hidden" value="PUT">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-3 mb-3">

                        <label for="status">Status</label>
                        <select id="status"class="form-select" aria-label="Default select example" name="status" required>
                              <option selected value="{{$gold->status }}">{{($gold->status )==0 ? 'internal':'external'}}</option>
                              <option value="0">internal</option>
                              <option value="1"> external</option>
                          </select>
                      </div>
                      </div>

                    <div class="row">
                      <div class="col-md-3 mb-3">
                        @php
                            $bid= $gold->barId;
                            $kart=DB::select("SELECT * FROM bar WHERE id= $bid");
                        //echo $kart[0]->karat;
                        @endphp
                        <label for="barid">karat</label>
                        <select class="form-select" aria-label="Default select example" name="karat" required>
                            <option selected value="{{$kart[0]->karat}}">{{$kart[0]->karat}}</option>
                            @foreach ($bars as $bar)
                            <option value="{{$bar->karat}}">{{$bar->karat}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="treasuryid">Treasury Id</label>
                        <select class="form-select" aria-label="Default select example" name="treasuryid" required>
                            <option selected value="{{$gold->treasuryId}}">{{$gold->treasuryId}}</option>
                            @foreach ($treasuries as $treasury)
                            <option value="{{$treasury->id}}">{{$treasury->id}} ,status={{ ($treasury->status == 0) ? 'Internal' : 'External'}}</option>

                            @endforeach
                        </select>
                    </div></div>
                    <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="weight">Weight Kg</label>
                        <input type="text" class="form-control" name="weight" placeholder="" value="{{$gold->weight}}" required>
                    </div>
                    </div>

                    <div class="row align-content-center" >
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
