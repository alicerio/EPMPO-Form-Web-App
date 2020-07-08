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
        <div id = "required">
            <label>
                CSJ or CN
            </label>
            <input id="scj" type="text" class="form-control" name="csj_cn" autocomplete="off" value="{{ $project->csj_cn ?? '' }}" readonly>
            <label>
                Project Name <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
            </label>
            <input type="text" class="form-control" name="name" autocomplete="off" value="{{ $project->name ?? '' }}" disabled>
            <label>
                Project Description <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
            </label>
            <input type="text" class="form-control" name="description" autocomplete="off" value="{{ $project->description ?? '' }}" disabled>
            <label>
                Limit From <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
            </label>
            <input type="text" class="form-control" name="limit_from" autocomplete="off" value="{{ $project->limit_from ?? '' }}" disabled>
            <label>
                Limit To <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
            </label>
            <input type="text" class="form-control" name="limit_to" autocomplete="off" value="{{ $project->limit_to ?? '' }}" disabled>
            <button  class="btn btn-info" style="margin:1%" type="button" id="toggleMapButton">Draw Project limit and query data</button>
        </div>
        <div>@include('projects.map')</div>
        
        <label>
            Need and Purpose: <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
        </label>
        <textarea disabled name="need_purpose" class="form-control">{{ $project->need_purpose ?? '' }}</textarea>
        <label>
            Agency Comments: <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
        </label>
        <textarea disabled name="agency_comments" class="form-control">{{ $project->agency_comments ?? '' }}</textarea>
        <hr>
        <label>
            <input type="checkbox" name="transit_funds_request" autocomplete="off" {{ $project->transit_funds_request ?? '' == true ? 'checked' : '' }} disabled>
            Requesting Transit funds for his project/program (FTA, State and/or Local Funds)
        </label>
        <br>
        <div class="form-row">
            <div class="col">
                <label class="font-weight-bold">
                    Federal Fiscal Year(FY): <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
                </label>
                <input type="number" name="fiscal_year" class="form-control" autocomplete="off" value="{{ $project->fiscal_year ?? '' }}" disabled>
            </div>
            <div class="col">
                <label>
                    Network Year <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
                </label>
                <select disabled name="network_year" class="form-control">
                    <option></option>
                    {{$temp = $project->network_year ?? ''}}
                    <option value="2020" {{ $temp == 2020 ? 'selected' : ''}}>2020</option>
                    <option value="2030" {{ $temp == 2030 ? 'selected' : ''}}>2030</option>
                    <option value="2040" {{ $temp == 2040 ? 'selected' : ''}}>2040</option>
                    <option value="2050" {{ $temp == 2050 ? 'selected' : ''}}>2050</option>
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