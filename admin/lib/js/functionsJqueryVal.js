$(document).ready(function () {
   //alert('Heeeello');
   //pour pouvoir utiliser regex
   
  /* $("#form_commande").submit(function(){
      alert("okk"); 
   });*/
   
    $.validator.addMethod("regex", function (value, element, regexpr) {
        return regexpr.test(value);
    }, "Format non valide.");

    $("#formInsc").validate({
        rules: {
            nom:{
                required:true,
                max:30
            },
            prenom:{
                required:true,
                max:20
            },
            adr:{
                required:true,
                max:50
            },
            numAdr:{
                required:true,
                max:3 
            },
            cp:{
                required:true,
                min:1000,
                max:9999
            },
            tel: {
                required:true,
                regex:/^(0)[0-9]{1,2}\/[0-9]{2}\.[0-9]{2}\.[0-9]{2}$/
            },
            pseudo:{
                required:true,
                min:5,
                max:20
            },
            mdp:{
                required:true,
                min:5
            },
            submitHandler:function(form){
                form.submit();
            }
        }
    });
});