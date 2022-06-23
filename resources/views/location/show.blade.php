@extends('layouts.appme')

@section('content')
<div class="container w-80"> @include('inc.messages  ')</div>
 <div class=" container w-80 display-6  d-flex justify-content-between">
    <a href="/home" class="btn btn-dark">&laquo; Back</a>
    <a href="/location/create" class="btn btn-success">Add New Location &raquo;</a>
</div>
<br>
    @if(count($locations)>0)
        <div class=" container w-80 display-7 fs-5">
            <table class="table table-striped table-bordered text-center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Country Name</th>
                    <th scope="col">Governorate</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $location)
                    <tr>
                        <td>{{$location->id}}</td>
                        <td>{{$location->country}}</td>
                        <td>{{$location->governorate}}</td>
                        <td class="">{{$location->address}}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <div class="col">
                                <i class="bi bi-pencil-square"></i>
                                <a href="/location/{{$location->id}}/edit" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 20">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                  </svg> edit</a>
                                </div>
                                <div class="col">
                                    <form action="{{route('location.destroy',$location->id)}}" method="POST">
                                        <input name="_method" type="hidden" value="DELETE">
                                        {{ csrf_field() }}
                                        <button  class="btn btn-danger"  type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 20">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg> Delete</button>
                                    </form>
                                </div>
                            </div>



                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



    @else
    <div class="container w-75 text-center"> <h1>No Locations Found!</h1></div>

    @endif
@endsection
