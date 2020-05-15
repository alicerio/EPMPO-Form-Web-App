@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                @foreach($logOfChanges as $log)
                <p>{{$log}}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
