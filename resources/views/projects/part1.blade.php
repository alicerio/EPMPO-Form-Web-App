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
        <button class="btn btn-info" id='toggleMapButton' type="button">Draw Project limit and query data</button>
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