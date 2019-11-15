$(document).ready(function () {
    var valueList = [];

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

    // Action button reject
    $('#left').on('click', function(){
       creatListSelected();
    });

    //Action button acept
    $('#right').on('click', function(){
        creatListSelected();
    });

    function creatListSelected() {
        $('#crimeList tr').each(function() {
            $(this).find("input[type=checkbox]:checked").each(function() {
            var values = [];
            $(this).closest("td").siblings("td").each(function(i, element) {
                if (i === 0) {
                    values.push($(this).text());
                }
            });
            valueList.push(values.join(", "));
            updatedState();
            });
        });
    };
    

    function updatedState() {
        var dataString = 'ids=' + valueList.join();
        $.ajax({
            url: "../php/updatedStateCrime.php",
            type:"POST",
            data:dataString,
            dataType:"html"                
        }).done(function(data) {
            console.log(data);
            alert(data);
            window.location.reload();
        });
    }

    // charge list
    function chargeCrimeList() {
        $.ajax({
            url: "../php/moderar.php",
            type:"GET"
            }).done(function(data) {
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