@extends('layouts.app')
<script>
    var projectH = <?php echo json_encode($project);?>; 
    var obj = <?php echo json_encode($logOfChanges ?? '');?>; 
    console.log('on edit');
    window.onload = function() {
        if(projectH.status == 2){
            make_project_funding_readonly();
        }else{
            form1_setView();
        }
    };
   
    console.log("on Edit view");
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
                @if($project->status != 0)
                @include('projects.comments')
                @endif
            </div>
        </div>
        <div id="editButtonsDiv">
            @if($project->status == 2)
            @include('projects.buttons_show')
            @else
            @include('projects.buttons_edit')
            @endif
        </div>
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
@endsection