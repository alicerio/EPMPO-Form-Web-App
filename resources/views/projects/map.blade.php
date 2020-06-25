<div id="mapH" style="display:none;">
  <div class="row">
    <div class="col-10" id="map"></div>
    <div style="margin-top:1%" class="col-2">
      <button type='button' class="btn btn-info" title="Get Crashes that within 50 meters of lines"
        onclick="point_drawer()">Query Crashes</button>
      <button type='button' class="btn btn-info" title="Display pavements that intersect with lines drawn"
        onclick="lineDrawer()">Query Pavements</button>
      <button type='button' class="btn btn-info" title="Clear map" onclick="clearMetadata()"> Clear</button>
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
          <td><input type="number" id="f1_seriousInjuries" class="form-control" name="serious_injuries"
              value="{{$project->serious_injuries ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Fair condition</td>
          <td><input type="number" id="f1_nonI" class="form-control" name="non_incapacitating_injuries"
              value="{{$project->non_incapacitating_injuries ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Poor condition</td>
          <td><input type="number" id="f1_possibleI" class="form-control" name="possible_injuries"
              value="{{$project->possible_injuries ?? ''}}" readonly></td>
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
          <td><input type="number" id="f1_crashes" class="form-control" name="crashes"
              value="{{$project->crashes ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Fatal crashes</td>
          <td><input type="number" id="f1_seriousInjuries" class="form-control" name="serious_injuries"
              value="{{$project->serious_injuries ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Serious injury Crashes</td>
          <td><input type="number" id="f1_nonI" class="form-control" name="non_incapacitating_injuries"
              value="{{$project->non_incapacitating_injuries ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Crashes Involving Pedestrians or cyclists</td>
          <td><input type="number" id="f1_possibleI" class="form-control" name="possible_injuries"
              value="{{$project->possible_injuries ?? ''}}" readonly></td>
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
          <td><input type="number" id="f1_crashes" class="form-control" name="crashes"
              value="{{$project->crashes ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Fatal crashes</td>
          <td><input type="number" id="f1_seriousInjuries" class="form-control" name="serious_injuries"
              value="{{$project->serious_injuries ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Serious injury Crashes</td>
          <td><input type="number" id="f1_nonI" class="form-control" name="non_incapacitating_injuries"
              value="{{$project->non_incapacitating_injuries ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Crashes Involving Pedestrians or cyclists</td>
          <td><input type="number" id="f1_possibleI" class="form-control" name="possible_injuries"
              value="{{$project->possible_injuries ?? ''}}" readonly></td>
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
          <td><input type="number" id="f1_seriousInjuries" class="form-control" name="serious_injuries"
              value="{{$project->serious_injuries ?? ''}}" readonly></td>
          <td><input type="number" id="f1_seriousInjuries" class="form-control" name="serious_injuries"
              value="{{$project->serious_injuries ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Fair condition</td>
          <td><input type="number" id="f1_nonI" class="form-control" name="non_incapacitating_injuries"
              value="{{$project->non_incapacitating_injuries ?? ''}}" readonly></td>
          <td><input type="number" id="f1_seriousInjuries" class="form-control" name="serious_injuries"
              value="{{$project->serious_injuries ?? ''}}" readonly></td>
        </tr>
        <tr>
          <td>Poor condition</td>
          <td><input type="number" id="f1_possibleI" class="form-control" name="possible_injuries"
              value="{{$project->possible_injuries ?? ''}}" readonly></td>
          <td><input type="number" id="f1_seriousInjuries" class="form-control" name="serious_injuries"
              value="{{$project->serious_injuries ?? ''}}" readonly></td>
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