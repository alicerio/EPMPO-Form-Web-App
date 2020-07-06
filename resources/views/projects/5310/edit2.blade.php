@extends('layouts.app')
@php
    //--  Store current user --
    $currentUser = auth()->user()->type
@endphp
<script type="text/javascript">
    var project = <?php echo json_encode($project);?>; 
    var currentUser = <?php echo json_encode($currentUser);?>;  // get current user
    window.onload = function() {
        show_edit_ViewMap();
        if(project.status == 3){
            make_project_readonly();
        }
        else if(project.status == 1){
            set_required();
            form2_setView();
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
        <div id="buttonHolder">
            @include('projects.buttons_edit')
            @auth
            @if(auth()->user()->type != 2)
                <button class="btn btn-info" rows = "5" id="toggleCommentsButton" type="button">Show Comments</button>
                <textarea name="comments" id="commentS" style="display:none;" class="form-control" rows="5" placeholder="Comments" readonly>{{$project->comments ?? '' }}</textarea>
            @else
                <textarea name="comments" id="commentS" style="display:none;" class="form-control" rows="5" placeholder="Comments" readonly>{{$project->comments ?? '' }}</textarea>
            @endif
            @endauth
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
<script>
    $(document).ready(function() {
    $("#toggleCommentsButton").click(function(){
       $("#commentS").toggle( 'slow', function(){
       });
    });
 });
</script>
@endsection