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
      height: 400px;
      width: 100%;
    }
  </style>
</head>

<div>


  <div class="row">
    <div class="col-md-6">
      <div id="map"></div>
    </div>
    <div class="col-md-6">
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="crashesSwitch">
        <label class="custom-control-label" for="crashesSwitch">Display Crashes</label>
  
      </div>
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="pavementCondSwitch">
        <label class="custom-control-label" for="pavementCondSwitch">Pavement Condition</label>
 
      </div>
      <button onclick="point_drawer()">Draw</button>
      <button onclick="lineDrawer()">Circle Test</button>
    </div>
  </div>

  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCY0B3_Fr1vRpgJDdbvNmrVyXmoOOtiq64&libraries=visualization&libraries=drawing&callback=initMap">
    src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    </script>
</div>

