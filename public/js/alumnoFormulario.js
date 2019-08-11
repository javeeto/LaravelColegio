/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $("#alumnoForm").validate({
        rules: {
            nombres: {
                required: true,
                maxlength: 120,
                minlength: 3,
                pattern: '[a-zA-Z ]*'
            },
            apellidos: {
                required: true,
                maxlength: 120,
                minlength: 3,
                pattern: '[a-zA-Z ]*'
            },
            genero: {
                required: true,
                minlength: 1

            },
            documento: {
                required: true,
                digits: true
            },
            fechanacimiento: {
                required: true,
                minlength: 1

            }

        },
        messages: {
            nombres: {
                required: "El campo debe ser diligenciado",
                maxlength: "Excede el maximo de 120 caracteres",
                minlength: "Debe tener mas de 3 caracteres",
                pattern: "Nombres sin numeros o caracteres especiales"
            },
            apellidos: {
                required: "El campo debe ser diligenciado",
                pattern: "Apellidos sin numeros o caracteres especiales"
            }
        },

    });

    var urlGenero = "../../genero";

    $.ajax({url: urlGenero, success: function (result) {
            // var objgenero = jQuery.parseJSON(result);
            $.each(result, function (i, item) {
                $('#genero').append($('<option>', {
                    value: item.idgenero,
                    text: item.nombregenero
                }));
            });

        }});

});

