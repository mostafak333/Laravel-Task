@extends('layouts.appme')

@section('content')
<div class="container w-80"> @include('inc.messages  ')</div>
 <div class=" container w-80 display-6  d-flex justify-content-between">
    <a href="/home" class="btn btn-dark">&laquo; Back</a>
    <a href="/bar/create" class="btn btn-success">Add New Bar Of Gold &raquo;</a>
</div>
<br>
    @if(count($bars)>0)
        <div class=" container w-80 display-7 fs-5">
            <table class="table table-striped table-bordered text-center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Karat</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($bars as $bar)
                    <tr>
                        <td>{{$bar->id}}</td>
                        <td>{{$bar->karat}}</td>
                        <td>
                                <div class=" container">
                                    <form action="{{route('bar.destroy',$bar->id)}}" method="POST">
                                        <input name="_method" type="hidden" value="DELETE">
                                        {{ csrf_field() }}
                                        <button  class="btn btn-danger"  type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 20">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg> Delete</button>
                                    </form>
                                </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



    @else
    <div class="container w-75 text-center"> <h1>No Bars Found!</h1></div>

    @endif
@endsection
