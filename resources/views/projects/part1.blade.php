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
        <button type="button" onclick="toggleVisibilityMap()">Draw Project limit and query data</button>
        <div id="mapH" style="display:none;">
            <div class="row">
                <div class="col-md-8" id="map"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <h4>Crashes</h4>
                            <table>
                                <tr>
                                    <td>Serious Injuries</td>
                                    <td id="f1_seriousInjuries"></td>
                                </tr>

                                <tr>
                                    <td>Non incapacitating Injuries</td>
                                    <td id="f1_nonI"></td>
                                </tr>

                                <tr>
                                    <td>Possible Injnuries</td>
                                    <td id="f1_possibleI"></td>
                                </tr>
                                <tr>
                                    <td>Injured Driving</td>
                                    <td id="f1_InjuredD"></td>
                                </tr>
                                <tr>
                                    <td>Injured Walking</td>
                                    <td id="f1_InjuredW"></td>
                                </tr>
                                <tr>
                                    <td>Injured Freight</td>
                                    <td id="f1_InjuredF"></td>
                                </tr>
                                <tr>
                                    <td>Injured Biking</td>
                                    <td id="f1_InjuredB"></td>
                                </tr>
                                <tr>
                                    <td>Killed</td>
                                    <td id="f1_killed"></td>
                                </tr>
                                <tr>
                                    <td>Killed Driving</td>
                                    <td id="f1_killedD"></td>
                                </tr>
                                <tr>
                                    <td>Killed Walking</td>
                                    <td id="f1_killedW"></td>
                                </tr>
                                <tr>
                                    <td>Killed Freight</td>
                                    <td id="f1_killedF"></td>
                                </tr>
                                <tr>
                                    <td>Killed Biking</td>
                                    <td id="f1_killedB"></td>
                                </tr>
                                <tr>
                                    <td>Crashes</td>
                                    <td id="f1_crashes"></td>
                                </tr>
                                <tr>
                                    <td>Crashes Driving</td>
                                    <td id="f1_crashesD"></td>
                                </tr>
                                <tr>
                                    <td>Crashes Walking</td>
                                    <td id="f1_crashesW"></td>
                                </tr>
                                <tr>
                                    <td>Crashes Freight</td>
                                    <td id="f1_crashesF"></td>
                                </tr>
                                <tr>
                                    <td>Crashes Biking</td>
                                    <td id="f1_crashesB"></td>
                                </tr>
                            </table>
                        </div>

                    <!--    <div class="col-6">
                            <h4>Pavements</h4>
                            <table>
                                <tr>
                                    <td>Poor pavement miles:</td>
                                    <td id="f1_pvmntMilespoor"></td>
                                </tr>              
                            </table>
                        </div>
                    </div> -->
                </div>
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