$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });


    // Map
    mapboxgl.accessToken = 'pk.eyJ1IjoiZ2FicmllbGFhcmRpbGVzIiwiYSI6ImNrMmFpZGF4ODFlNjczbW9qaGZnZm15ZHUifQ.aGKpPRl6l8kZvBIKjFgxLA';
    var map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/streets-v11',
      center: [-96, 37.8],
      zoom: 4
    });
    map.addControl(new mapboxgl.GeolocateControl({
      positionOptions: {
          enableHighAccuracy: true
      },
      trackUserLocation: true
    }));
    // var size = 100;
    //                     var zoomThreshold = 4;
 
    //                     var pulsingDot = {
    //                     width: size,
    //                     height: size,
    //                     data: new Uint8Array(size * size * 4),
                        
    //                     onAdd: function() {
    //                     var canvas = document.createElement('canvas');
    //                     canvas.width = this.width;
    //                     canvas.height = this.height;
    //                     this.context = canvas.getContext('2d');
    //                     },
                        
    //                     render: function() {
    //                     var duration = 1000;
    //                     var t = (performance.now() % duration) / duration;
                        
    //                     var radius = size / 2 * 0.3;
    //                     var outerRadius = size / 2 * 0.7 * t + radius;
    //                     var context = this.context;
                        
    //                     // draw outer circle
    //                     context.clearRect(0, 0, this.width, this.height);
    //                     context.beginPath();
    //                     context.arc(this.width / 2, this.height / 2, outerRadius, 0, Math.PI * 2);
    //                     context.fillStyle = 'rgba(255, 200, 200,' + (1 - t) + ')';
    //                     context.fill();
                        
    //                     // draw inner circle
    //                     context.beginPath();
    //                     context.arc(this.width / 2, this.height / 2, radius, 0, Math.PI * 2);
    //                     context.fillStyle = 'rgba(255, 100, 100, 1)';
    //                     context.strokeStyle = 'white';
    //                     context.lineWidth = 2 + 4 * (1 - t);
    //                     context.fill();
    //                     context.stroke();
                        
    //                     // update this image's data with data from the canvas
    //                     this.data = context.getImageData(0, 0, this.width, this.height).data;
                        
    //                     // keep the map repainting
    //                     map.triggerRepaint();
                        
    //                     // return `true` to let the map know that the image was updated
    //                     return true;
    //                     }
    //                     };
                        
    //                     map.on('load', function () {
    //                       map.addSource('population', {
    //                     'type': 'vector',
    //                     'url': 'mapbox://mapbox.660ui7x6'
    //                     });
    //                     map.addImage('pulsing-dot', pulsingDot, { pixelRatio: 2 });
                        
    //                     map.addLayer({
    //                     "id": "points",
    //                     "type": "symbol",
    //                     "source": {
    //                     "type": "geojson",
    //                     "data": {
    //                     "type": "FeatureCollection",
    //                     "features": [{
    //                     "type": "Feature",
    //                     "geometry": {
    //                     "type": "Point",
    //                     "coordinates": [0, 0]
    //                     }
    //                     }]
    //                     }
    //                     },
    //                     "layout": {
    //                     "icon-image": "pulsing-dot"
    //                     }
    //                     });
    //                     map.addLayer({
    //                       'id': 'state-population',
    //                       'source': 'population',
    //                       'source-layer': 'state_county_population_2014_cen',
    //                       'maxzoom': zoomThreshold,
    //                       'type': 'fill',
    //                       'filter': ['==', 'isState', true],
    //                       'paint': {
    //                       'fill-color': [
    //                       'interpolate',
    //                       ['linear'],
    //                       ['get', 'population'],
    //                       0, '#F2F12D',
    //                       500000, '#EED322',
    //                       750000, '#E6B71E',
                        
    //                       ],
    //                       'fill-opacity': 0.75
    //                       }
    //                       }, 'waterway-label');
                          
    //                       map.addLayer({
    //                       'id': 'county-population',
    //                       'source': 'population',
    //                       'source-layer': 'state_county_population_2014_cen',
    //                       'minzoom': zoomThreshold,
    //                       'type': 'fill',
    //                       'filter': ['==', 'isCounty', true],
    //                       'paint': {
    //                       'fill-color': [
    //                       'interpolate',
    //                       ['linear'],
    //                       ['get', 'population'],
    //                       0, '#F2F12D',
    //                       100, '#EED322',
    //                       1000, '#E6B71E',
    //                       ],
    //                       'fill-opacity': 0.75
    //                       }
    //                       }, 'waterway-label');
                          
    //                       });
                          
    //                       var stateLegendEl = document.getElementById('state-legend');
    //                       var countyLegendEl = document.getElementById('county-legend');
    //                       map.on('zoom', function() {
    //                       if (map.getZoom() > zoomThreshold) {
    //                       stateLegendEl.style.display = 'none';
    //                       countyLegendEl.style.display = 'block';
    //                       } else {
    //                       stateLegendEl.style.display = 'block';
    //                       countyLegendEl.style.display = 'none';
    //                       }
    //                       });
                          
});