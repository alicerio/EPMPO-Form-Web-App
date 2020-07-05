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
        <div class="card">
            <div class="card-header">
                <h5 class="float-left">Project: {{ $project->name }}</h5>
            </div>
        <input type="hidden" class="form-control" name="status" value="{{ $project->status ?? '2' }}" readonly>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    @auth
                    @if(auth()->user()->type == 2)
                        <textarea name="comments" id="commentS" class="form-control" rows="5" placeholder="Add Comments">{{$project->comments ?? '' }}</textarea>
                        <button id="button_text_changer" class="btn btn-primary mx-1" type="submit">
                            Save Comments
                        </button>
                    @endif
                    @endauth
                </div>
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
