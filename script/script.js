$(document).ready(function () {
    $(window).on('load',function(){
        $('#modelLogIn').modal('show');
    });

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