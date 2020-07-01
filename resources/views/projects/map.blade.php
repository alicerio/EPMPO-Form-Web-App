<div id="mapH" style="display:none;">
  <div class="row">
    <div class="col-10" id="map"></div>
    <div style="margin-top:1%" class="col-2">
      <button id="queryCrashesBtn" type='button' class="btn btn-info" title="Get Crashes that within 50 meters of lines"
        onclick="point_drawer('crashes')">Query Crashes</button>
      <button id="queryBridgesBtn" type='button' class="btn btn-info" title="Get Crashes that within 50 meters of lines"
        onclick="point_drawer('bridges')">Query Bridges</button>
      <button id="queryPavementsBtn" type='button' class="btn btn-info"
        title="Display pavements that intersect with lines drawn" onclick="lineDrawer()">Query Pavements</button>
      <button id="clearQueryBtn" type='button' class="btn btn-info" title="Clear map" onclick="clearMetadata()">
        Clear</button>
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
              value="{{$project->pavement_good_condition ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Fair condition</td>
          <td><input type="number" id="fair_pavement" class="form-control" name="pavement_fair_condition"
              value="{{$project->pavement_fair_condition ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Poor condition</td>
          <td><input type="number" id="poor_pavement" class="form-control" name="pavement_poor_condition"
              value="{{$project->pavement_poor_condition ?? ''}}" readonly></td>
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
              value="{{$project->total_crash_EP ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Fatal crashes</td>
          <td><input type="number" id="EP_fatal_crash" class="form-control" name="fatal_crash_EP"
              value="{{$project->fatal_crash_EP ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Serious injury Crashes</td>
          <td><input type="number" id="EP_injury_crash" class="form-control" name="injury_crash_EP"
              value="{{$project->injury_crash_EP ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Crashes Involving Pedestrians or cyclists</td>
          <td><input type="number" id="EP_pedestrian_crash" class="form-control" name="pedestrian_crash_EP"
              value="{{$project->pedestrian_crash_EP ?? ''}}" readonly></td>
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
              value="{{$project->total_crash_DA ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Fatal crashes</td>
          <td><input type="number" id="DA_fatal_crash" class="form-control" name="fatal_crash_DA"
              value="{{$project->fatal_crash_DA ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Serious injury Crashes</td>
          <td><input type="number" id="DA_injury_crash" class="form-control" name="injury_crash_DA"
              value="{{$project->injury_crash_DA ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Crashes Involving Pedestrians or cyclists</td>
          <td><input type="number" id="DA_pedestrian_crash" class="form-control" name="pedestrian_crash_DA"
              value="{{$project->pedestrian_crash_DA ?? ''}}" readonly></td>
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
              value="{{$project->good_bridges ?? ''}}" readonly></td>
          <td><input type="number" id="good_deck_area" class="form-control" name="good_area"
              value="{{$project->good_area ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Fair condition</td>
          <td><input type="number" id="fair_bridge" class="form-control" name="fair_bridges"
              value="{{$project->fair_bridges ?? ''}}" readonly></td>
          <td><input type="number" id="fair_deck_area" class="form-control" name="fair_area"
              value="{{$project->fair_area ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Poor condition</td>
          <td><input type="number" id="poor_bridge" class="form-control" name="poor_bridges"
              value="{{$project->poor_bridges ?? ''}}" readonly></td>
          <td id="poor_deck_area"><input type="number" class="form-control" name="poor_area"
              value="{{$project->poor_area ?? ''}}" readonly></td>
        </tr>
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
    src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  </script>

</div>