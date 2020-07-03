<script type="text/javascript">
    window.onload = function() {
        form1_setView();
    };
</script>
@extends('layouts.app')

@section('content')

<div id="showHolder" class="container">
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                @include('projects.part1')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('projects.part2')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('projects.part3')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('projects.part4')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('projects.part5')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('projects.part6')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('projects.part7')
            </div>
        </div>  
        @include('projects.buttons_create') 
    <form>
</div>
<style>
    button {
        margin: 1%;
    }

    #space {
        margin: 5%;
    }

    .pb-cmnt-container {
        font-family: Lato;
        margin-top: 100px;
    }

    .pb-cmnt-textarea {
        resize: none;
        padding: 20px;
        height: 15%;
        width: 100%;
        border: 1px solid #F2F2F2;
    }
</style>
<script src="{{ asset('docs/js/logOfChangesLogic.js')}}"></script>
<script src="{{ asset('docs/js/form1FrontEndLogic.js')}}"></script>
<script src="{{ asset('docs/js/sharedFrontEndLogic.js')}}"></script>
@endsection