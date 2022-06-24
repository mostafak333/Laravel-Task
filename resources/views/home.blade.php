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
            <div class="cover-container p-3  text-center" style="margin-top: 170px">
                <h1 class="cover-heading">Goldady</h1>
                <h2 class="lead">Welcome to our stock.</h2>
            </div>
        </div>
    </div>
</div>
@endsection
