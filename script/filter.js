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
        optionsTypeCrime = "<option value='0'>Seleccionar tipo de crimen</option>" + data;
          $('#type_crime').html(optionsTypeCrime);
      });
  };

  function chargeZones(){
      $.ajax({
          url: "../php/zones.php",
          type:"GET"
          }).done(function(data) {
            options = "<option value='0'>Seleccionar zona</option>" + data;
              $('#zone').html(options);
      });
  };
        
});
