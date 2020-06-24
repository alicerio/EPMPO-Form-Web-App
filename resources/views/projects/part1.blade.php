<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.rawgit.com/bjornharrtell/jsts/gh-pages/1.4.0/jsts.min.js"></script>
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
        Electornic Project Request Form (ePRF)
    </div>
    <div class="card-body">
        <input id="project_type" type="hidden" class="form-control" name="project_type" value="{{ $project->project_type ?? '1' }}" readonly>
        <label>
            MPO ID
        </label>
        <input id="mpo_id" type="text" class="form-control" name="mpo_id" value="{{ $project->mpo_id ?? '' }}" readonly>

        <label>
            CSJ or CN
        </label>
        <input id="scj" type="text" class="form-control" name="csj_cn" value="{{ $project->csj_cn ?? ''}}" readonly>

        <label>
            Name
        </label>
        <input type="text" class="form-control" name="name" value="{{ $project->name ?? ''}}" disabled>

        <label>
            Description
        </label>
        <input type="text" class="form-control" name="description" value="{{ $project->description ?? ''}}" disabled>

        <label>
            Limit From
        </label>
        <input type="text" class="form-control" name="limit_from" value="{{ $project->limit_from ?? ''}}" disabled>

        <label>
            Limit To
        </label>
        <input type="text" class="form-control" name="limit_to" value="{{ $project->limit_to ?? ''}}" disabled>
        <button  class="btn btn-info" id='toggleMapButton' type="button">Draw Project limit and query data</button>
        @include('projects.map')
        <div id="mapH" style="display:none;">
            <div class="row">
                <div id="map"></div>
            </div>
            <div class="row">
                <button type='button' title="Get Crashes that within 50 meters of lines" onclick="point_drawer()">Query Crashes</button>
                <button type='button' title="Display pavements that intersect with lines drawn" onclick="lineDrawer()">Query Pavements</button>
                <button type='button' title="Clear map" onclick="clearMetadata()"> Clear</button>
            </div>


            <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCY0B3_Fr1vRpgJDdbvNmrVyXmoOOtiq64&libraries=visualization&libraries=drawing&callback=initMap">
                src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            </script>

        </div>
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