<?php
$obj = new ClientDB($cnx);
$donnees = $obj->infoClient($_SESSION['user']['pseudo'],$_SESSION['user']['mdp']);
?>

<div class="container">
      
    <div class="row rectangle">
        <div class="col-xs-12 col-sm-12 centrerTexte bordureBottom espaceTexte"><h2>THANK YOU</h2></div>
            
        <div class="col-sm-12 panel-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 gras centrerTexte"><p>NUMERO DE COMMANDE &nbsp;&nbsp; <span class="secondGrey nonGras"><?php print $_SESSION["numCom"]; ?> </span></p></div>
<!--                <div class="col-xs-4 col-sm-4 secondGrey"><p> <?php//print $_SESSION["numCom"]; ?></p></div>-->
            </div>
            
            <div class="row">
                <div class="col-xs-6 col-sm-6 "><p>Numéro de client : </p></div>
                <div class="col-xs-6 col-sm-6"><p><?php print $donnees[0]->id_client; ?></p></div>
            </div>
            
            <div class="row">
                <div class="col-xs-6 col-sm-6"><p>Nom : </p></div>
                <div class="col-xs-6 col-sm-6"><p><?php print $donnees[0]->nom; ?></p></div>
            </div>
            
            <div class="row">
                <div class="col-xs-6 col-sm-6"><p>Prénom : </p></div>
                <div class="col-xs-6 col-sm-6"><p><?php print $donnees[0]->prenom; ?></p></div>
            </div>
            
            <div class="row">
                <div class="col-xs-6 col-sm-6"><p>Adresse : </p></div>
                <div class="col-xs-6 col-sm-6"><p><?php print $donnees[0]->adresse.", ".$donnees[0]->cp; ?></p></div>
            </div>
            
            <div class="row">
                <div class="col-xs-6 col-sm-6"><p>Prénom : </p></div>
                <div class="col-xs-6 col-sm-6"><p><?php print $donnees[0]->prenom; ?></p></div>
            </div>
              
            <div class="row">
                <div class="col-xs-6 col-sm-6"><p>Date commande : </p></div>
                <div class="col-xs-6 col-sm-6"><p><?php print date('Y-m-d'); ?></p></div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 gras centrerTexte"><p>TOTAL &nbsp;&nbsp; <span class="secondGrey nonGras"><?php print $_SESSION["total"]; ?> € </span></p></div>
<!--                <div class="col-xs-4 col-sm-4 secondGrey"><p> <?php//print $_SESSION["numCom"]; ?></p></div>-->
            </div>
            
           
        </div>
    </div>
</div>

<?php 
$_SESSION['panier']=NULL;

