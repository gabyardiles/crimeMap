$(document).ready(function () {
    chargeTypeCrimeMap()
  // Map
  function chargeTypeCrimeMap() {
    $.ajax({
      url: "../php/mapa_delito.php",
      type:"GET"
      }).done(function(data) {
        var myJsonString = JSON.parse(data);
        console.log(myJsonString.features);
        // Map
        mapboxgl.accessToken = 'pk.eyJ1IjoiZ2FicmllbGFhcmRpbGVzIiwiYSI6ImNrMndwM2h0MzBmNjgzbHF3OWtodXgzeTcifQ.J7akpCRoHz6s2Dl2W6gcJA';
      
        myJsonString.features.forEach(function(marker) {
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

          var size = 200;
          
          var pulsingDot = {
            width: size,
            height: size,
            data: new Uint8Array(size * size * 4),
            
            onAdd: function() {
            var canvas = document.createElement('canvas');
            canvas.width = this.width;
            canvas.height = this.height;
            this.context = canvas.getContext('2d');
            },
            
            render: function() {
            var duration = 1000;
            var t = (performance.now() % duration) / duration;
            
            var radius = size / 3 * 0.3;
            var outerRadius = size / 3 * 0.7 * t + radius;
            var context = this.context;
            
            context.clearRect(0, 0, this.width, this.height);
            context.beginPath();
            context.arc(this.width / 3, this.height / 3, outerRadius, 0, Math.PI * 3);
            context.fillStyle = 'rgba(255, 200, 200,' + (1 - t) + ')';
            context.fill();
            
            context.beginPath();
            context.arc(this.width / 3, this.height / 3, radius, 0, Math.PI * 2);
            context.fillStyle = 'rgba(255, 100, 100, 1)';
            context.strokeStyle = 'white';
            context.lineWidth = 2 + 4 * (1 - t);
            context.fill();
            context.stroke();
            
            this.data = context.getImageData(0, 0, this.width, this.height).data;
            map.triggerRepaint();
            return true;
          }
          };

          map.on('load', function() {
            map.addImage('pulsing-dot', pulsingDot, { pixelRatio: 2 });
            map.addLayer({
              "id": "points",
              "type": "symbol",
              "source": {
              "type": "geojson",
              "data": myJsonString
              },
              "layout": {
              "icon-image": "pulsing-dot",
              "text-field": ["get", "title"],
              "text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
              "text-offset": [0, 0.6],
              "text-anchor": "top"
              }
            });
        });

        });
  });
  };


  $('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
    $(this).toggleClass('active');
});

$('#type_crime_toggle').on('click', function() {
    chargeOptionsTypeCrime()
})

$('#located_toggle').on('click', function() {
    chargeOptionsZones()
})


validateDate()

function validateDate() {
    var date = $('#dateFilter')
    var Currentdate = new Date();

    var day = Currentdate.getDate();
    var month = Currentdate.getMonth() + 1;
    var year = Currentdate.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;       
    date.val(today);

    // Validate range date
    date.on('change', function() {
        var regex = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
        var dateSelected = new Date(date.val())
        var daySelected = dateSelected.getDate();
        var monthSelected = dateSelected.getMonth() + 1;
        var yearSelected = dateSelected.getFullYear(); 

        if (monthSelected < 10) monthSelected = "0" + monthSelected;
        if (daySelected < 10) daySelected= "0" + daySelected;

        var selectionDate = yearSelected + "-" + monthSelected + "-" + daySelected;

        if (selectionDate >= today) {
            alert("La fecha elegida no puede ser mayor al día de hoy");
            date.val(today);
        } else if (dateSelected.val() != '' && !dateSelected.val().match(regex)) {
            alert("Formato de fecha invalido, por favor reintente");
        }            
        
    });

};

function chargeOptionsTypeCrime() {
    $.ajax({
        url: "../php/types_crime_Menu.php",
        type:"GET"
    }).done(function(data) {
        $('#Tipos_delito_Submenu').html(data);
    });
};


function chargeOptionsZones() {
    $.ajax({
        url: "../php/zones.php",
        type:"GET"
    }).done(function(data) {
        $('#located_select').html(data);
    });
  };
});