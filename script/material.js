$(document).ready(function () {
    chargeCrimeList();

    // validate selected checkbox 
    $('#customCheck1').on('change', function() {
        console.log('check gral');
        if (this.checked) {
            $("input[type=checkbox]").each(function(i,e)
            {
                e.checked=true
            })
        } else {
            $("input[type=checkbox]").each(function(i,e)
        {
            e.checked=false
        })
        }
    });

    $('#left').on('click', function(){

    });
    $('#right').on('click', function(){

    });

    function chargeCrimeList() {
        $.ajax({
            url: "../php/moderar.php",
            type:"GET"
            }).done(function(data) {
                console.log(data);
                // var myJsonString = JSON.parse(data);
                // console.log(myJsonString);
                // myJsonString.features.forEach(function(item) {
                //     markup = "<tr><td><input type='checkbox' name='record'></td><td>" + item.ID + "</td><td>" + tem.crimen_Tipo_de_crimen+ "</td></tr>"; 
                //     $("table tbody").html(data); 
                //     // $('#crimeList').append('<tr><td><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck1" checked><label class="custom-control-label" for="customCheck1"></label></div></td><td> + item.ID + </td><td>item.crimen_Tipo_de_crimen</td><td>item.Descripcion</td><td>item.Fecha_delito item.Hora_delito</td><td>item.Zona</td></tr>');
        
                // });
                $("table tbody").html(data);
                
        });
    }

});