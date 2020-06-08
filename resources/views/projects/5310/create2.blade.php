@extends('layouts.app')

@section('content')

<div id="showHolder" class="container">
    <form action="{{ route('bprojects.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                @include('projects/5310.5310_part1')
            </div>
        </div>
    </form>
</div>

<script src="{{ asset('docs/js/form2FrontEndLogic.js')}}"></script>
