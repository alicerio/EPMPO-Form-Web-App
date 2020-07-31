@extends('layouts.app')
@php
    //--  Store current user --
    $currentUser = auth()->user()->type
@endphp

<script>
    var project = <?php echo json_encode($project);?>; 
    var currentUser = <?php echo json_encode($currentUser);?>;  // get current user
    window.onload = function() {
        show_edit_ViewMap();
        //helps in hiding questions 4 to 10
        display4To10();
        // Helps in hiding options
        for(let i =1; i <7; i++){
            displayBox("strategy_"+i);
        }
        for(let j = 1; j < 6; j++){
            displayBox("psp_"+j);
        }
        for(let k = 1; k < 36; k++) {
            displayBox("sqq_"+k)
        }
        if(project.status == 1){
            set_required();  
            form2_setView();
        }
        else if(project.status == 3){
            make_project_readonly();
        }
        else{
            form2_setView();
        }
        
        if(currentUser == 1){
            remove_readonly("signed_textarea");
        }
    };
</script>

@section('content')

<div id="showHolder" class="container">
    <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
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
        <div id="buttonHolder">
            @include('projects.buttons_edit')
        </div>
    </form>
</div>
<style>
    button {
        margin: 1%;
    }
</style>
<script src="{{ asset('docs/js/form2FrontEndLogic.js')}}"></script>
<script src="{{ asset('docs/js/logOfChangesLogic.js')}}"></script>
<script src="{{ asset('docs/js/sharedFrontEndLogic.js')}}"></script>

@endsection