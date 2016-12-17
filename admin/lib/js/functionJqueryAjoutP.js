$(document).ready(function () {

    $("#formAjoutP").on('submit', function (e) {
        e.preventDefault();

        var $this = $(this);

        ref = $("#ref").val();
        detail_taille = $("#taille").val();
        if ($.trim(ref) !== '' && $.trim(detail_taille) !== '') {
            $.ajax({
                url: './admin/lib/php/ajax/ajaxAjoutProduit.php', //$this.attr('action'),//'./admin/lib/php/ajax/ajaxAjoutProduit.php',
                type: 'GET', //$this.attr('method'),//'GET',
                data: $this.serialize(), //"ref="+ref,
                dataType: 'json',

                success: function (data) { //data = ce qui revient du script PHP
                    $("#myModal").modal();
                    $("#modal-title").html("Vous venez d'ajouter au panier le produit suivant :");
                    $("#modal-image").html('<img class="img-responsive" src="' + data[0].image + '"/>');
                    $("#modal-libelle").html('<span class="gras">'+data[0].libelle+'</span>');
                    $("#modal-ref").html('<span class="texteARap gray">Réf : '+data[0].id_produit+'</span>');
                    $("#modal-taille").html('<span class="texteARap" >Taille : '+detail_taille+'</span>');
                    $("#modal-qte").html('<span class="texteARap" >Quantité : '+$("#qte").val()+'</span>');
                    
                    $.ajax({
                        url: 'index.php?page=ajaxSession.php',
                        type: 'POST',
                        data: $this.serialize(),

                        success: function () {
                            console.log("ok");
                            $("#resumer").html('Article ajouté').fadeToggle(2000);//.addClass('voir').show(2000);

                        },
                        error: function () {
                            console.log("erreur ajout aticle dans panier");
                        }
                    });
                },
                error: function () {
                    $("#myModal").modal();
                    $("#modal-title").html("Il semble y avoir un problème !");
                    
                    $("#modal-details").html("Désolé nous n'avons plus de stocks");

                }
            });
        }
    });

});