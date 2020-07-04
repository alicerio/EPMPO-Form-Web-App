@extends('layouts.app')
<script>
    var project = <?php echo json_encode($project);?>; 
    window.onload = function() {
        show_edit_ViewMap();
        if(project.status == 3){
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
        <div class="row" style="display: none">
            <div class="col-md-12">
                @include('projects.part1')
            </div>
        </div>
        <div id="buttonHolder">
            <input type="hidden" class="form-control" name="status" value="{{ $project->status ?? '2' }}" readonly>
            <button id="button_text_changer" class="btn btn-primary mx-1" type="submit">
                Save Comments
            </button>

        </div>
        <div class="row">
    <div class="col-md-12">
        <div class="form-group">
        @auth
        @if(auth()->user()->type == 2)
            <button class="btn btn-info" rows = "5" id="toggleCommentsButton" type="button">Add Comments</button>
            <textarea name="comments" id="commentS" style="display:none;" class="form-control" rows="5" placeholder="Add Comments">{{$project->comments ?? '' }}</textarea>
        @else
            <button class="btn btn-info" rows = "5" id="toggleCommentsButton" type="button">Show Comments</button>
            <textarea name="comments" id="commentS" style="display:none;" class="form-control" rows="5" placeholder="Show Comments" readonly>{{$project->comments ?? '' }}</textarea>
        @endif
        @endauth
        </div>
    </div>
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
<script>
    $(document).ready(function() {
    $("#toggleCommentsButton").click(function(){
       $("#commentS").toggle( 'slow', function(){
       });
    });
 });
</script> 
@endsection
