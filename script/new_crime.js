$(document).ready(function () {
    var elementsInput = document.getElementsByTagName("INPUT");
    var elementsTA = document.getElementsByTagName("TEXTAREA");

    // charge <select>
    chargeTypes_crime()
    chargeZones()

    // validate fields
    validateFields(elementsInput)
    validateFields(elementsTA)

    // validate date and hours
    validateDate()
    validateHours()


    // validations input
    function validateFields(elements) {
        var success = false;
        for (var i = 0; i < elements.length; i++) {
            elements[i].oninvalid = function (e) {
                e.target.setCustomValidity("");
                if (!e.target.validity.valid) {
                    switch (e.srcElement.id) {
                        case "address":
                            success = true;
                            e.target.setCustomValidity("El campo dirección no puede estar vacio");
                            break;
                        case "descriptionCrime":
                            success = true;
                            e.target.setCustomValidity("El campo descripción no puede estar vacio");
                            break;
                    }
                }
            };

            elements[i].oninput = function (e) {
                e.target.setCustomValidity("");
            };
        }
    };   


    // action change selected option
    $('#type_crime').on('change', function (e) {
        // send data
    });

    // action change selected option
    $('#zone').on('change', function (e) {
        // send data
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
    }

    function validateDate() {
        var date = $('#date_crime')
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


    function validateHours() {
        var hour = $('#hour_crime').val()
        var isValid = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/.test(hour);
        if (!isValid) {
            // alert("El format de la hora es incorrecto por favor reintente");
        }
    };
    
});
