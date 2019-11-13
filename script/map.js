$(document).ready(function () {
    chargeTypeCrimeMap()  
  // Map
  function chargeTypeCrimeMap() {
    $.ajax({
      url: "../php/mapa_delito.php",
      type:"GET"
      }).done(function(data) {
        // Map
        mapboxgl.accessToken = 'pk.eyJ1IjoiZ2FicmllbGFhcmRpbGVzIiwiYSI6ImNrMndwM2h0MzBmNjgzbHF3OWtodXgzeTcifQ.J7akpCRoHz6s2Dl2W6gcJA';
        var map = new mapboxgl.Map({
          container: 'map',
          style: 'mapbox://styles/mapbox/streets-v11',
          center: [-58.392321, -34.737410],
          zoom: 10
        });
        
        map.addControl(new mapboxgl.GeolocateControl({
          positionOptions: {
              enableHighAccuracy: true
          },
          trackUserLocation: true
        }));
        map.on('load', function() {
          map.addLayer({
            "id": "points",
            "type": "symbol",
            "source": {
            "type": "geojson",
            "data": data
            },
            "layout": {
            "icon-image": ["concat", ["get", "icon"], "-15"],
            "text-field": ["get", "title"],
            "text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
            "text-offset": [0, 0.6],
            "text-anchor": "top"
            }
          });
      });
  });
  };
});