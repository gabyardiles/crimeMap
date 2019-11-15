$(document).ready(function () {
  // charge <select>
  chargeTypes_crime()
  chargeZones()
   
  // action change selected option
  $('#type_crime').on('change', function (e) {
      // send data
      console.log('seleccion de tipo');
    //   filter();
  });

  // action change selected option
  $('#zone').on('change', function (e) {
      // send data
      console.log('seleccion de zona');
    //   filter();
  });

  // action button send
  $('#submint').on('click', function () {
      console.log('action button submint');
      // send data
      // validate fields
    //   filter();
  });


  function chargeTypes_crime() {
      $.ajax({
          url: "../php/types_crime.php",
          type:"GET"
      }).done(function(data) {
          $('#type_crime').html(data);
      });
  };

  function chargeZones(){
      $.ajax({
          url: "../php/zones.php",
          type:"GET"
          }).done(function(data) {
              $('#zone').html(data);
      });
  };


//   function filter() {
//     console.log('entra al filtro');
//     var zone = $('#zone').val();
//     var type_crime = $('#type_crime').val();
//     console.log($('#zone'));
//     console.log(type_crime);


//     var dataString = 'complete_query=AND zone_id=' + zone;
//     $.ajax({
//         url: "../php/mapa_delito.php",
//         type:"POST",
//         data:dataString,
//         dataType:"html"                
//     }).done(function(data) {
//         console.log(data);
//         alert('data', data);
//         window.location.replace('../html/crimeMap.php');
//     });
// }
        
});
