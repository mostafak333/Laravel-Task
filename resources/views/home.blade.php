@extends('layouts.appme')

@section('content')
<div class="container">
    <div class="row justify-content-center">


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container ">
                        <div class="row  text-center">
                          <div class="col-sm">
                            <div class="card mb-4 box-shadow">
                                <div class="card-header">
                                  <h4 class="my-0 font-weight-normal">Add </h4>
                                </div>
                                <div class="card-body">
                                   </div>
                              </div>
                          </div>

                          <div class="col-sm">
                            <div class="card mb-4 box-shadow">
                                <div class="card-header">
                                  <h4 class="my-0 font-weight-normal">View all data</h4>
                                </div>
                                <div class="card-body">
                                    <a href="/location" class="btn btn-lg btn-block btn-outline-primary"> View Locations</a><br><br>
                                    <a href="/gold" class="btn btn-lg btn-block btn-outline-primary"> View Gold</a><br><br>
                                </div>
                              </div>
                          </div>
                      </div>
    </div>
</div>
@endsection
