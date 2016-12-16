$(document).ready(function () {
    $("#pseudo").blur(function () {
        var pseudo= $("#pseudo").val();
        if ($.trim(pseudo) !== ""){
            recherche = "pseudo=" + pseudo;
            $.ajax({
                type: "GET",
                data: recherche,
                dataType: "json",
                url: './admin/lib/php/ajax/ajaxCheckPseudo.php',
                success: function (data) {
                    
                    if(data !== 0){
                        $("#lblPseudo").addClass("has-error");
                        $('#erreurPseudo').html("Ce pseudo est déjà pris !");
                        console.log('ok auth');
                    }
                    
                },
                error:function(){
                  console.log('pas ok auth')  
                }
            });
        }
                
    });
    
    $("#pseudo").focus(function(){
        $("#lblPseudo").removeClass("has-error");
        $('#erreurPseudo').html("");
    });
});