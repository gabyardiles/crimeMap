$(document).ready(function () {
    var valueList = [];
    var offset = 0;
    
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
            $('.modal-body').html('Se cambió el estado de los crímenes seleccionados de forma exitosa'); 
            $('#empModal').modal('show');
        });
    };
    
    $('#closeModalSucces').on('click', function(){
        window.location.reload();
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
                "dateUntil" : dateUntil,
                "offset": offset
            };
            $.ajax({
                url: "../php/moderar.php",
                type:"POST",
                data:dataString,
                dataType:"html"
                }).done(function(data) {
                    $("table tbody").html(data);
                });  
    };

     $('#avanzar').on('click', function(){
        var totalRows = $('table tbody').find('tr').length;
                if (totalRows == 10) {
                    offset += 10;
                    selectFilter()
                } else {
                    offset = offset;
                }
    });
    
    $('#retroceder').on('click', function(){
        if (offset != 0) {
            offset -= 10;
            selectFilter()
        }
    });
    $('#submint_filter').on('click', function(){
            selectFilter();

    });

});

