
$(document).ready(function () {

    $.extend($.validator, {
        messages: {
            required: "Veuillez renseigner tous les champs",
            email: "Veuillez renseigner un email valide",
            url: "Veuillez renseigner une URL valide.",
            date: "Veuillez renseigner une date valide",
            number: "Veuillez renseigner des chiffres valides",
            digits: "Veuillez renseigner que des chiffres",
            equalTo: "Les valeurs doivent être identiques",
            maxlength: $.validator.format("Saisissez {0} caractères maximum"),
            minlength: $.validator.format("Saisissez au minimum {0} caractères"),
            rangelength: $.validator.format("Entrez entre {0} et {1} caractères"),
            range: $.validator.format("Entrez une valeur entre {0} et {1}"),
            max: $.validator.format("Valeur maximum : {0}"),
            min: $.validator.format("Valeur minimum : {0}.")
        }
    });


});