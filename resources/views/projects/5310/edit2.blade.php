<script type="text/javascript">
    var project = <?php echo json_encode($project);?>; 
    window.onload = function() {
        show_edit_ViewMap();
        if(project.status == 3){
            make_project_readonly();
        }else{
            //form1_setView();
            form2_setView();
        }
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
        <div id="buttonHolder">
            @include('projects.buttons_edit')
        </div>
    </form>
</div>
<script src="{{ asset('docs/js/form2FrontEndLogic.js')}}"></script>
<script src="{{ asset('docs/js/logOfChangesLogic.js')}}"></script>
<script src="{{ asset('docs/js/sharedFrontEndLogic.js')}}"></script>
@endsection