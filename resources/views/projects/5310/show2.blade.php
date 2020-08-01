<script type="text/javascript">
    var obj = <?php echo json_encode($logOfChanges);?>; 
    var project = <?php echo json_encode($project);?>; 
            console.log(obj);
            console.log(project);
    window.onload = function() {
        make_project_readonly();
        show_edit_ViewMap();
        display4To10();
        for(let i =1; i <7; i++){
            displayBox("strategy_"+i);
        }
        for(let j = 1; j < 6; j++){
            displayBox("psp_"+j);
        }
        for(let k = 1; k < 36; k++) {
            displayBox("sqq_"+k)
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
            @include('projects.buttons_show')
        </div>
    </form>
</div>
<script src="{{ asset('docs/js/form2FrontEndLogic.js')}}"></script>
<script src="{{ asset('docs/js/logOfChangesLogic.js')}}"></script>
<script src="{{ asset('docs/js/sharedFrontEndLogic.js')}}"></script>



@endsection