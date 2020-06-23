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