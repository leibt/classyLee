$(document).ready(function () {
   //alert('Heeeello');
   //pour pouvoir utiliser regex
   
    $.validator.addMethod("regex", function (value, element, regexpr) {
        return regexpr.test(value);
    }, "Format non valide.");

    $("#auth").validate({
        rules:{
            pseudoA:{
                required:true,
                minlength:5,
                maxlength:20
            },
            mdpA:{
                required:true,
                minlength:5
            },
            submitHandler:function(form){
                form.submit();
            }
        }
    });
    
    

    $("#formInsc").validate({
        rules: {
            nom:{
                required:true,
                maxlength:30
            },
            prenom:{
                required:true,
                maxlength:20
            },
            adr:{
                required:true,
                maxlength:50
            },
            numAdr:{
                required:true,
                maxlength:3,
                digits:true
            },
            cp:{
                required:true,
                min:1000,
                max:9999,
                maxlength:4,
                digits:true
            },
            tel: {
                required:true,
                regex:/^(0)[0-9]{1,2}\/[0-9]{2}\.[0-9]{2}\.[0-9]{2}$/
            },
            pseudo:{
                required:true,
                minlength:5,
                maxlength:20
            },
            mdp:{
                required:true,
                minlength:5
            },
            submitHandler:function(form){
                form.submit();
            }
        }
    });
});