<div id="mapH" style="display:none;">
    <div class="tip">
        <div>
            <b>Map Instructions:</b>
            <ol>
                <li>Double click on the desired location to place marker. Place at least 2 markers to continue. </li>
                <li>Click once on any button on the right to perform a calculation.</li>
                <li>Please wait for the program to calculate, may vary on web connection and number of markers placed.</li>
                <li>After calculations are done, the map will display the filter results.</li>
                <li>Click save at the end of the form to save map results.</li>
            </ol>
        </div><svg style="color:blue" width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-question-circle"
            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path
                d="M5.25 6.033h1.32c0-.781.458-1.384 1.36-1.384.685 0 1.313.343 1.313 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.007.463h1.307v-.355c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.326 0-2.786.647-2.754 2.533zm1.562 5.516c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
        </svg>
    </div>
    <div class="row">
        <div class="col-10" id="map"></div>
        <div style="margin-top:1%" class="col-2">
            <button id="queryCrashesBtn" type='button' class="btn btn-info" title="Get crashes within 50 meters."
                onclick="point_drawer('crashes');disable(id)">Query Crashes</button>
            <button id="queryBridgesBtn" type='button' class="btn btn-info" title="Get bridges within 50 meters."
                onclick="point_drawer('bridges');disable(id)">Query Bridges</button>
            <button id="queryPavementsBtn" type='button' class="btn btn-info"
                title="Display pavements that intersect with lines drawn." onclick="lineDrawer();disable(id)">Query
                Pavements</button>
            <button id="clearCrashesBtn" type='button' class="btn btn-info" title="Clear map" onclick="clearCrashes('queryCrashesBtn')">
                Clear Crashes</button>
            <button id="clearBridgesBtn" type='button' class="btn btn-info" title="Clear map" onclick="clearBridges('queryBridgesBtn')">
                Clear Bridges</button>
            <button id="clearPavementsBtn" type='button' class="btn btn-info" title="Clear map" onclick="clearPavements('queryPavementsBtn')">
                Clear Pavements</button>
            <button id="clearQueryBtn" type='button' class="btn btn-info" title="Clear map" onclick="clearMap()">
                Clear All</button>
        </div>
    </div>
    <div class="row" style="margin-top:1%">
        <div class="col-4">
            <h5>Pavement condition along project limits</h5>
            <table class="table">
                <tr>
                    <th>Source: HPMS 2018 </td>
                    <th>lane miles count</th>
                </tr>
                <tr>
                    <td>Good Condition</td>
                    <td><input type="number" id="good_pavement" class="form-control" name="pavement_good_condition"
                            value="{{ $project->pavement_good_condition ?? '' }}" readonly></td>
                </tr>
                <tr>
                    <td>Fair condition</td>
                    <td><input type="number" id="fair_pavement" class="form-control" name="pavement_fair_condition"
                            value="{{ $project->pavement_fair_condition ?? '' }}" readonly></td>
                </tr>
                <tr>
                    <td>Poor condition</td>
                    <td><input type="number" id="poor_pavement" class="form-control" name="pavement_poor_condition"
                            value="{{ $project->pavement_poor_condition ?? '' }}" readonly></td>
                </tr>
            </table>
        </div>
        <div class="col-4">
            <h5>Crash history along project limits </h5>
            <table class="table" style="margin-top:10%">
                <tr>
                    <th>Within El Paso County (2015-2019)
                        Source: TxDOT CRIS </td>
                    <th>Count</th>
                </tr>
                <tr>
                    <td>Total crashes</td>
                    <td><input type="number" id="EP_total_crash" class="form-control" name="total_crash_EP"
                            value="{{ $project->total_crash_EP ?? '' }}" readonly></td>
                </tr>
                <tr>
                    <td>Fatal crashes</td>
                    <td><input type="number" id="EP_fatal_crash" class="form-control" name="fatal_crash_EP"
                            value="{{ $project->fatal_crash_EP ?? '' }}" readonly></td>
                </tr>
                <tr>
                    <td>Serious injury Crashes</td>
                    <td><input type="number" id="EP_injury_crash" class="form-control" name="injury_crash_EP"
                            value="{{ $project->injury_crash_EP ?? '' }}" readonly></td>
                </tr>
                <tr>
                    <td>Crashes Involving Pedestrians or cyclists</td>
                    <td><input type="number" id="EP_pedestrian_crash" class="form-control" name="pedestrian_crash_EP"
                            value="{{ $project->pedestrian_crash_EP ?? '' }}" readonly></td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <th>Within Dona Ana & Otero Counties (2014-2018)
                        Source: NMDOT </td>
                    <th>Count</th>
                </tr>
                <tr>
                    <td>Total crashes</td>
                    <td><input type="number" id="DA_total_crash" class="form-control" name="total_crash_DA"
                            value="{{ $project->total_crash_DA ?? '' }}" readonly></td>
                </tr>
                <tr>
                    <td>Fatal crashes</td>
                    <td><input type="number" id="DA_fatal_crash" class="form-control" name="fatal_crash_DA"
                            value="{{ $project->fatal_crash_DA ?? '' }}" readonly></td>
                </tr>
                <tr>
                    <td>Serious injury Crashes</td>
                    <td><input type="number" id="DA_injury_crash" class="form-control" name="injury_crash_DA"
                            value="{{ $project->injury_crash_DA ?? '' }}" readonly></td>
                </tr>
                <tr>
                    <td>Crashes Involving Pedestrians or cyclists</td>
                    <td><input type="number" id="DA_pedestrian_crash" class="form-control" name="pedestrian_crash_DA"
                            value="{{ $project->pedestrian_crash_DA ?? '' }}" readonly></td>
                </tr>
            </table>
        </div>
        <div class="col-4">
            <h5>Bridge & culvert condition along project limits </h5>
            <table class="table">
                <tr>
                    <th>Source: NBIAS 2019 </td>
                    <th>Number of bridges </th>
                    <th>Deck area (sq. ft.)</th>
                </tr>
                <tr>
                    <td>Good Condition</td>
                    <td><input type="number" id="good_bridge" class="form-control" name="good_bridges"
                            value="{{ $project->good_bridges ?? '' }}" readonly></td>
                    <td><input type="number" id="good_deck_area" class="form-control" name="good_area"
                            value="{{ $project->good_area ?? '' }}" readonly></td>
                </tr>
                <tr>
                    <td>Fair condition</td>
                    <td><input type="number" id="fair_bridge" class="form-control" name="fair_bridges"
                            value="{{ $project->fair_bridges ?? '' }}" readonly></td>
                    <td><input type="number" id="fair_deck_area" class="form-control" name="fair_area"
                            value="{{ $project->fair_area ?? '' }}" readonly></td>
                </tr>
                <tr>
                    <td>Poor condition</td>
                    <td><input type="number" id="poor_bridge" class="form-control" name="poor_bridges"
                            value="{{ $project->poor_bridges ?? '' }}" readonly></td>
                    <td><input type="number" id="poor_deck_area" class="form-control" name="poor_area"
                            value="{{ $project->poor_area ?? '' }}" readonly></td>
                </tr>
                @if($project->points ?? '' != null)
                    @foreach($project->points ?? '' as $index => $categories)
                        <input type="hidden" id="point" class="form-control" name="points[]"
                            value="{{ $project->points[$index] ?? '' }}" readonly>
                    @endforeach
                @else
                    <input type="hidden" id="point" class="form-control" name="points[]" readonly>
                @endif
            </table>
        </div>
    </div>
    <style>
        #mapH {
            margin-top: 1%;
            margin-bottom: 1%;
        }
    </style>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCY0B3_Fr1vRpgJDdbvNmrVyXmoOOtiq64&libraries=visualization&libraries=drawing&callback=initMap">
        src = "http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"

    </script>
</div>
