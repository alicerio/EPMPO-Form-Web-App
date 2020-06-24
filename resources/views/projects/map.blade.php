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
              <td><input type="number" id="f1_seriousInjuries" class="form-control" name="serious_injuries"
                  value="{{$project->serious_injuries ?? ''}}" readonly></td>
            </tr>
            <tr>
              <td>Non incapacitating Injuries</td>
              <td><input type="number" id="f1_nonI" class="form-control" name="non_incapacitating_injuries"
                  value="{{$project->non_incapacitating_injuries ?? ''}}" readonly></td>
            </tr>
            <tr>
              <td>Possible Injnuries</td>
              <td><input type="number" id="f1_possibleI" class="form-control" name="possible_injuries"
                  value="{{$project->possible_injuries ?? ''}}" readonly></td>
            </tr>
            <tr>
              <td>Injured Driving</td>
              <td><input type="number" id="f1_InjuredD" class="form-control" name="injured_driving"
                  value="{{$project->injured_driving ?? ''}}" readonly></td>
            </tr>
            <tr>
              <td>Injured Walking</td>
              <td><input type="number" id="f1_InjuredW" class="form-control" name="injured_walking"
                  value="{{$project->injured_walking ?? ''}}" readonly></td>
            </tr>
            <tr>
              <td>Injured Freight</td>
              <td><input type="number" id="f1_InjuredF" class="form-control" name="injured_freight"
                  value="{{$project->injured_freight ?? ''}}" readonly></td>
            </tr>
            <tr>
              <td>Injured Biking</td>
              <td><input type="number" id="f1_InjuredB" class="form-control" name="injured_biking"
                  value="{{$project->injured_biking ?? ''}}" readonly></td>
            </tr>
            <tr>
              <td>Killed</td>
              <td><input type="number" id="f1_killed" class="form-control" name="killed"
                  value="{{$project->killed ?? ''}}" readonly></td>
            </tr>
            <tr>
              <td>Killed Driving</td>
              <td><input type="number" id="f1_killedD" class="form-control" name="killed_driving"
                  value="{{$project->killed_driving ?? ''}}" readonly></td>
            </tr>
            <tr>
              <td>Killed Walking</td>
              <td><input type="number" id="f1_killedW" class="form-control" name="killed_walking"
                  value="{{$project->killed_walking ?? ''}}" readonly></td>
            </tr>
            <tr>
              <td>Killed Freight</td>
              <td><input type="number" id="f1_killedF" class="form-control" name="killed_freight"
                  value="{{$project->killed_freight ?? ''}}" readonly></td>
            </tr>
            <tr>
              <td>Killed Biking</td>
              <td><input type="number" id="f1_killedB" class="form-control" name="killed_biking"
                  value="{{$project->killed_biking ?? ''}}" readonly></td>
            </tr>
            <tr>
              <td>Crashes</td>
              <td><input type="number" id="f1_crashes" class="form-control" name="crashes"
                  value="{{$project->crashes ?? ''}}" readonly></td>
            </tr>
            <tr>
              <td>Crashes Driving</td>
              <td><input type="number" id="f1_crashesD" class="form-control" name="crashes_driving"
                  value="{{$project->crashes_driving ?? ''}}" readonly></td>
            </tr>
            <tr>
              <td>Crashes Walking</td>
              <td><input type="number" id="f1_crashesW" class="form-control" name="crashes_walking"
                  value="{{$project->crashes_walking ?? ''}}" readonly></td>
            </tr>
            <tr>
              <td>Crashes Freight</td>
              <td><input type="number" id="f1_crashesF" class="form-control" name="crashes_freight"
                  value="{{$project->crashes_freight ?? ''}}" readonly></td>
            </tr>
            <tr>
              <td>Crashes Biking</td>
              <td><input type="number" id="f1_crashesB" class="form-control" name="crashes_biking"
                  value="{{$project->crashes_biking ?? ''}}" readonly></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div style="margin-top:1%" class="col-12">
      <button type='button' class="btn btn-info" title="Get Crashes that within 50 meters of lines"
        onclick="point_drawer()">Query Crashes</button>
      <button type='button' class="btn btn-info" title="Display pavements that intersect with lines drawn"
        onclick="lineDrawer()">Query Pavements</button>
      <button type='button' class="btn btn-info" title="Clear map" onclick="clearMetadata()"> Clear</button>
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