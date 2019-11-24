$(document).ready(function () {
    var valueList = [];

    selectFilter();

    // charge <select>
    chargeZones();
    chargeTypes_crime()

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
            $('.modal-body').html('Se cambio el estado de los crimenes seleccionados de forma exitosa'); 
            $('#empModal').modal('show');
        });
    };
    
    $('#closeModalSucces').on('click', function(){
        window.location.reload();
    });

    // charge list
    function chargeCrimeList() {
        $.ajax({
            url: "../php/moderar.php",
            type:"GET"
            }).done(function(data) {
                $("table tbody").html(data);
        });
    };

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
                $('#zone_moderator').html(options);
        });
    }


    function selectFilter() {
        var zone_moderator = $('#zone_moderator').val();
            var type_crime = $('#type_crime').val();
            var dateSince = $('#dateSince').val();
            var dateUntil = $('#dateUntil').val();
            
    
            var dataString = {
                "zone": zone_moderator,
                "type_crime" : type_crime,
                "dateSince": dateSince,
                "dateUntil" : dateUntil
            };
            $.ajax({
                url: "../php/moderar.php",
                type:"POST",
                data:dataString,
                dataType:"html"
                }).done(function(data) {
                    console.log('asfadsa',data);
                    $("table tbody").html(data);
                });  
    };
    
    $('#submint_filter').on('click', function(){
            selectFilter();
            // window.location.reload();
    });

});

