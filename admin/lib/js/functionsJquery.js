
$(document).ready(function () {

    /*$("#nbArt").hover(function () {
     $(this).fadeOut(1000, function () {
     $(this).fadeIn(5);
     });
     });*/
    //var test;
    $("#nbArt").removeClass('inv').addClass('vis');


    $('#nbArt').show(function () {
        $(this).addClass('clignoter');
    });

//    $('#achete').click(function () {
//
//            $("#resumer").addClass('voir').show(300000);
//        
//
////        $('#resumer').removeClass('cache').addClass('voir');
////        $("#resumer").slideDown("slow");
//        /*$('#resumer').removeClass('cache').addClass('voir');
//         $('#resumer').show(50000);*/
//    });
    /*
     if($('#nbArt').text() == ''){
     alert('OLM');
     }else alert('NOOO');
     */
    //alert($('#nbArt').text());


    /* $('.nbArt').click(function(){
     // var val = $('#nbArt').val();
     alert($('#nbArt').text());
     // var valeur = $('#nbArt').val();
     // alert(valeur);
     });
     /* $('.btnSubmit').click(function(){
     $(".nbArt").show(function(){
     $(".nbArt").html(nbArti); 
     });
     /*$('#myModal').modal({
     keyboard: false
     });*/
    //}); */

    /*$(".nbArt").show(function(){
     
     $(".nbArt").html('testons');
     });*/





    //$('.nbArt').hide();

    /*$(".btnSubmit").click(function () {
     $(".miniResum").show();
     /*var nbArt = $('#nbArticle').val();
     
     
     alert(nbArt);
     //$(this).show(); 
     
     
     /*$('.nbArt').fadeOut(1000,function(){
     
     });*/

    /*if (isset($_SESSION['ref'])) {
     for (var i = 0; i < count($_SESSION['panier']['ref']); i++) {
     var nbArt ;
     nbArt += $_SESSION['panier']['qte'][$i];
     }            
     }*/
    //});

    /*$(function () {
     if (isset($_SESSION['ref'])) {
     for ($i = 0; $i < count($_SESSION['panier']['ref']); $i++) {
     $nbArt += $_SESSION['panier']['qte'][$i];
     }
     }
     });*/

    /*$('#auth').validate({
     rules:{
     pseudo:{
     minlength:5,
     required:true
     },
     mdp:{
     minlenght:5,
     required:true
     }
     },
     
     });*/


    /*$('#hm-zoom img').mouseover(function(){
     $(this).toggle(function () {
     $(this).width('auto');
     });
     });
     */


});
