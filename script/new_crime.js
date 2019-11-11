$(document).ready(function () {
    var elementsInput = document.getElementsByTagName("INPUT");
    var elementsTA = document.getElementsByTagName("TEXTAREA");
    // var types = ["Acoso y violación","Robo a inmuebles","Robo de vehículos","Robo a individuos","Venta de estupefacientes","Violencia"]


    // // charge type_crim
    $('#type_crime').html('Downloading...');
    $.ajax({
    url: "../php/types_crime.php"
    }).done(function(data) {
        $('#type_crime').html(data);
    });
    
    validateFields(elementsInput)
    validateFields(elementsTA)


    // validations input
    function validateFields(elements) {
        for (var i = 0; i < elements.length; i++) {
            elements[i].oninvalid = function (e) {
                e.target.setCustomValidity("");
                if (!e.target.validity.valid) {
                    switch (e.srcElement.id) {
                        case "address":
                            e.target.setCustomValidity("El campo dirección no puede estar vacio");
                            break;
                        case "descriptionCrime":
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
    // action button send
    $('#submit').on('click', function (e) {
        // send data
    });

});