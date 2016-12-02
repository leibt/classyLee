<?php
$obj = new ClientDB($cnx);
$donnees = $obj->infoClient($_SESSION['user']['pseudo'],$_SESSION['user']['mdp']);
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 centrerTexte"><p>THANK YOU</p></div>
            
        <div class="col-sm-5 center-block bordure">
            <div class="row">
                
                <div class="col-sm-6"><p>Numéro de client : </p></div>
                <div class="col-sm-6"><p><?php print $donnees[0]->id_client; ?></p></div>
            </div>
            
            <div class="row">
                <div class="col-sm-6"><p>Nom : </p></div>
                <div class="col-sm-6"><p><?php print $donnees[0]->nom; ?></p></div>
            </div>
            
            <div class="row">
                <div class="col-sm-6"><p>Prénom : </p></div>
                <div class="col-sm-6"><p><?php print $donnees[0]->prenom; ?></p></div>
            </div>
            
            <div class="row">
                <div class="col-sm-6"><p>Adresse : </p></div>
                <div class="col-sm-6"><p><?php print $donnees[0]->adresse.", ".$donnees[0]->cp; ?></p></div>
            </div>
            
            <div class="row">
                <div class="col-sm-6"><p>Prénom : </p></div>
                <div class="col-sm-6"><p><?php print $donnees[0]->prenom; ?></p></div>
            </div>
            
            <div class="row">
                <div class="col-sm-6"><p>Numéro de commande : </p></div>
                <div class="col-sm-6"><p><?php print $_SESSION["numCom"]; ?></p></div>
            </div>
            
            <div class="row">
                <div class="col-sm-6"><p>Date commande : </p></div>
                <div class="col-sm-6"><p><?php print date('Y-m-d'); ?></p></div>
            </div>
            
            <div class="row">
                <div class="col-sm-6"><p>Total : </p></div>
                <div class="col-sm-6"><p><?php print $_SESSION['total']; ?></p></div>
            </div>
        </div>
    </div>
</div>

<?php 
$_SESSION['panier']=NULL;

