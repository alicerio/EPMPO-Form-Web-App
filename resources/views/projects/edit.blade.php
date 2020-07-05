@extends('layouts.app')
<script type="text/javascript">
    var project = <?php echo json_encode($project);?>; 
    console.log(project.status);
    window.onload = function() {
        show_edit_ViewMap();
        if(project.status == 1){
            set_required();  
            form1_setView();
        }
        else if(project.status == 3){
            console.log("aqui");
            make_project_readonly();
        }else{
            form1_setView();
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
<script>
    $(document).ready(function() {
    $("#toggleCommentsButton").click(function(){
       $("#commentS").toggle( 'slow', function(){
       });
    });
 });
</script> 
@endsection