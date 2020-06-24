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
        Electronic Project Request Form (5310 ePRF)
    </div>
    <div class="card-body">
        <input id="project_type" type="hidden" class="form-control" name="project_type" value="{{ $project->project_type ?? '5310' }}" readonly>
        <label>
            MPO ID
        </label>
        <input id = "mpo_id" type="text" class="form-control" name="mpo_id" autocomplete="off" value="{{ $project->mpo_id ?? '' }}" readonly>
        <label>
            CSJ or CN
        </label>
        <input id="scj" type="text" class="form-control" name="csj_cn" autocomplete="off" value="{{ $project->csj_cn ?? '' }}" readonly>
        <label>
            Project Name
        </label>
        <input type="text" class="form-control" name="name" autocomplete="off" value="{{ $project->name ?? '' }}" disabled>
        <label>
            Project Description
        </label>
        <input type="text" class="form-control" name="description" autocomplete="off" value="{{ $project->description ?? '' }}" disabled>
        <label>
            Limit From
        </label>
        <input type="text" class="form-control" name="limit_from" autocomplete="off" value="{{ $project->limit_from ?? '' }}" disabled>
        <label>
            Limit To
        </label>
        <input type="text" class="form-control" name="limit_to" autocomplete="off" value="{{ $project->limit_to ?? '' }}" disabled>
        <button  class="btn btn-info" style="margin:1%" type="button" id="toggleMapButton">Draw Project limit and query data</button>
        <div>@include('projects.map')</div>
        

        <label>
            Need and Purpose:
        </label>
        <textarea disabled name="need_purpose" class="form-control" {{ $project->need_purpose ?? '' }}></textarea>
        <label>
            Agency Comments:
        </label>
        <textarea disabled name="agency_comments" class="form-control" {{ $project->agency_comments ?? '' }}></textarea>
        <hr>
        <label>
            <input type="checkbox" name="transit_funds_request" autocomplete="off" {{ $project->transit_funds_request ?? '' == true ? 'checked' : '' }} disabled>
            Requesting Transit funds for his project/program (FTA, State and/or Local Funds)
        </label>
        <br>
        <div class="form-row">
            <div class="col">
                <label class="font-weight-bold">
                    Federal Fiscal Year(FY):
                </label>
                <input type="number" name="fiscal_year" class="form-control" autocomplete="off" value="{{ $project->fiscal_year ?? '' }}" disabled>
            </div>
            <div class="col">
                <label>
                    Network Year
                </label>
                <select disabled name="network_year" class="form-control">
                    <option>----</option>
                    <option value="2020" {{ $project->network_year ?? '' == 2020 ? 'selected' : ''}}>2020</option>
                    <option value="2030" {{ $project->network_year ?? '' == 2030 ? 'selected' : ''}}>2030</option>
                    <option value="2040" {{ $project->network_year ?? '' == 2040 ? 'selected' : ''}}>2040</option>
                    <option value="2045" {{ $project->network_year ?? '' == 2045 ? 'selected' : ''}}>2045</option>
                </select>
            </div>
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