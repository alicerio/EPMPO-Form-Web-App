<script type="text/javascript">
    window.onload = function() {
        form2_setView();
    };
</script>
@extends('layouts.app')

@section('content')

<div id="showHolder" class="container">
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-12">
                @include('projects/5310.5310_part1')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('projects/5310.5310_part2')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('projects/5310.5310_part3')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('projects/5310.5310_part4')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('projects/5310.5310_part5_edit')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('projects/5310.5310_part6')
            </div>
        </div>
        @include('projects/5310.buttons_create2')
    </form>
</div>
<script src="{{ asset('docs/js/form2FrontEndLogic.js')}}"></script>

@endsection
