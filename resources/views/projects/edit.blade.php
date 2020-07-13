@extends('layouts.app')
@php
$currentUser = auth()->user()->type // Store current user
@endphp
<script>
    var project = <?php echo json_encode($project);?>; 
    var currentUser = <?php echo json_encode($currentUser);?>;  // get current user
    console.log(project.status);
    window.onload = function() {
        //default
        show_edit_ViewMap();
    //helps in hiding questions 4 to 10
        display4To10();
      // Helps in hiding options
      for(let i =1; i <7; i++){
        displayBox("strategy_"+i);
      }
      for(let j = 1; j < 7; j++){
            displayBox("psp_"+j);
        }
      //special cases depending on status
        if(project.status == 1){
            set_required();  
            form1_setView();
        }
        else if(project.status == 3){
            make_project_readonly();
        }else{
            form1_setView();
        }

        // admin
        if(currentUser == 1){
            remove_readonly("signed_textarea");
        }
    };
</script>
@section('content')

<div id="showHolder" class="container">
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PATCH')
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
                @include('projects.part6Edit')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('projects.part7')
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