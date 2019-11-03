$(document).ready(function () {
    var elementsInput = document.getElementsByTagName("INPUT");
    var elementsTA = document.getElementsByTagName("TEXTAREA");

    validateFields(elementsInput)
    validateFields(elementsTA)

    function validateFields(elements) {
        for (var i = 0; i < elements.length; i++) {
            elements[i].oninvalid = function (e) {
                e.target.setCustomValidity("");
                if (!e.target.validity.valid) {
                    switch (e.srcElement.id) {
                        case "name":
                            e.target.setCustomValidity("El campo nombre no puede estar vacio");
                            break;
                        case "email":
                            e.target.setCustomValidity("El campo email no puede estar vacio");
                            break;
                        case "comments":
                        e.target.setCustomValidity("El campo cometarios no puede estar vacio");
                        break;
                    }
                }
            };

            elements[i].oninput = function (e) {
                e.target.setCustomValidity("");
            };
        }
    }
    
    // button submint
    $('#submit').on('click', function (e) {

    });
});
