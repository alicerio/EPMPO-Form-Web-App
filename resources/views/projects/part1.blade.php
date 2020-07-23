<head>
    <script src="{{ asset('docs/js/map_resources/map.js')}}"></script>
    <script src="{{ asset('docs/js/map_resources/line_test.js')}}"></script>
    <script src="{{ asset('docs/js/map_resources/point_test.js')}}"></script>
    <script src="{{ asset('docs/js/map_resources/shapeFunctions.js')}}"></script>
    <script src="{{ asset('docs/js/map_resources/toggle_handler.js')}}"></script>
    <style>
        #map {
            height: 450px;
            width: 100%;
        }
    </style>
</head>
<div class="card">
    <div class="card-header">
        Electronic Project Request Form (ePRF)
    </div>
    <div id="required" class="card-body">
        <input id="project_type" type="hidden" class="form-control" name="project_type" value="{{ $project->project_type ?? '5310' }}" readonly>
        <div id = "required">
            <input type="hidden"{{$temp = $project->new_project ?? ''}}>
            <input class= "mx-1" type="radio" name="new_project" value="1" {{ $temp == 1 ? 'checked' : '' }} autocomplete="off" disabled>New Project <br>
            <input class= "mx-1" type="radio" name="new_project" value="2"{{ $temp == 2 ? 'checked' : '' }} autocomplete="off" disabled>Revision/addition to an approved project<br>
            <div class="row">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;Is the decision making/governing body of your agency committed to this project?</p>
                <input type="hidden"{{$temp = $project->decision ?? ''}}>
                <input class= "mx-1" type="radio" name="decision" value="1" {{ $temp == 1 ? 'checked' : '' }} autocomplete="off" disabled>Yes
                <input class= "mx-1" type="radio" name="decision" value="2" {{ $temp == 2 ? 'checked' : '' }} autocomplete="off" disabled>No
            </div>
        </div>

        <input id="project_type" type="hidden" class="form-control" name="project_type" value="{{ $project->project_type ?? 'TASA' }}" readonly>
        <label>
            MPO ID
        </label>
        <input id="mpo_id" type="text" class="form-control" name="mpo_id" value="{{ $project->mpo_id ?? '' }}" readonly>

        <label>
            CSJ or CN
        </label>
        <input id="scj" type="text" class="form-control" name="csj_cn" value="{{ $project->csj_cn ?? ''}}" readonly>

        <label>
            Name  <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
        </label>
        <input type="text" class="form-control" name="name" value="{{ $project->name ?? ''}}" disabled>
        
        <label>
            Description <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
        </label>
        <input type="text" class="form-control" name="description" value="{{ $project->description ?? ''}}" disabled>

        <label>
            Limit From <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
        </label>
        <input type="text" class="form-control" name="limit_from" value="{{ $project->limit_from ?? ''}}" disabled>

        <label>
            Limit To <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
        </label>
        <input type="text" class="form-control" name="limit_to" value="{{ $project->limit_to ?? ''}}" disabled>
        <button class="btn btn-info" id='toggleMapButton' type="button">Draw Project limits and query data</button>
        @include('projects.map')
    </div>
</div>
<script>
    $(document).ready(function() {
    $("#toggleMapButton").click(function(){
       $("#mapH").toggle( 'slow', function(){
          $(".log").text('Toggle Transition Complete');
       });
    });
 });
</script> 