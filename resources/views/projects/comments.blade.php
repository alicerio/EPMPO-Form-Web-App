@extends('layouts.app')
<script>
    var project = <?php echo json_encode($project);?>; 
    window.onload = function() {
        show_edit_ViewMap();
        if(project.status == 3){
            make_project_readonly();
        }else{
            if(project.project_type == "TASA") {
                form1_setView();
            }
            else{
                form2_setView();
            }
        }
    };
</script>
@section('content')

<div id="showHolder" class="container">
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PATCH')
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
        @if($project->project_type == "TASA")
            <div class="row" style="display: none">
                <div class="col-md-12">
                    @include('projects.part1')
                    @include('projects.part2')
                    @include('projects.part3')
                    @include('projects.part4')
                    @include('projects.part5')
                    @include('projects.part6Edit')
                    @include('projects.part7')
                </div>
            </div>
        @else
        <div class="row" style="display: none">
                <div class="col-md-12">
                    @include('projects/5310.5310_part1')
                    @include('projects/5310.5310_part2')                    
                    @include('projects/5310.5310_part3')
                    @include('projects/5310.5310_part4')
                    @include('projects/5310.5310_part5_edit')
                    @include('projects/5310.5310_part6')
                </div>
            </div>
        @endif
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
<script src="{{ asset('docs/js/form2FrontEndLogic.js')}}"></script>
<script src="{{ asset('docs/js/sharedFrontEndLogic.js')}}"></script>


@endsection
