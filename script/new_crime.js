$(document).ready(function () {
    var types = ["Acoso y violación","Robo a inmuebles","Robo de vehículos","Robo a individuos","Venta de estupefacientes","Violencia"]

    types.forEach(function(value) {
        $('#type_crime')
        .append($("<option></option>")
        .attr("value", value)
        .text(value));
    });
});