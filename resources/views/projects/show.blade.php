@extends('layouts.app')
<script>
    window.onload = function() {
        make_project_funding_readonly();
    };
    var obj = <?php echo json_encode($logOfChanges);?>; 
    var project = <?php echo json_encode($project);?>; 
            console.log(obj);
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
        {{--
        @if($project->status == 2)
        <a class="btn btn-primary" href="{{route('projects.project_comments',$project->id)}}" role="button">Comments</a>
        @endif
        --}}
        @include('projects.buttons_show')
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
@endsection