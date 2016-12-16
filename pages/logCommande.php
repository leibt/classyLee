<?php
$objClient = new ClientDB($cnx);
$obj = new CommandeDB($cnx);
$objProd = new ProduitsDB($cnx);
if (isset($_POST['connectCom'])) {
    echo $_SESSION['tot'];

    if (!empty($_POST['pseudoA']) && !empty($_POST['mdpA'])) {
        $pseudo = htmlentities(strtolower($_POST['pseudoA'])); // de manière à identifier plus facilement (SANS PB DE CASE)
        $mdp = htmlentities(md5($_POST['mdpA']));

        $_SESSION["user"] = array();
        $_SESSION["user"]["pseudo"] = $pseudo;
        $_SESSION["user"]["mdp"] = $mdp;


        $verif = $objClient->verifConnexion($pseudo, $mdp);
        switch ($verif[0]) {
            case 0:
                echo "Pseudo ou mot de passe incorrect";
                break;

            case 2:
                $result = count($_SESSION["panier"]['ref']);

                for ($i = 0; $i < $result; $i++) {
                    $ref = $_SESSION["panier"]["ref"][$i];
                    $taille = $_SESSION["panier"]["taille"][$i];
                    $qte = $_SESSION["panier"]["qte"][$i];

                    $v = $objProd->updateQte($ref, $taille, $qte);
                }

                $date = date('Y-m-d');
                $total = $_SESSION['tot'];
                $id_commande = $obj->createCommande($pseudo, $mdp, $date, $total);

                //$_SESSION['total'] = $_SESSION['tot'];

                if ($id_commande > 0) {
                    $nbArt = count($_SESSION["panier"]["ref"]);

                    for ($i = 0; $i < $nbArt; $i++) {
                        $ref = $_SESSION["panier"]["ref"][$i];
                        $taille = $_SESSION["panier"]["taille"][$i];
                        $qte = $_SESSION["panier"]["qte"][$i];

                        $_SESSION["numCom"] = $id_commande;

                        $retour = $obj->ajoutDetailCommande($id_commande, $ref, $taille, $qte);

                        if ($retour == 1) {
                            header('Location: index.php?page=recapitulatifCommande.php');
                        }
                        //print '<br>Retour insert detail commande : '.$retour;
                    }
                }

                break;
        }
    }
}
?>

<div class="container contenu" >
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form role="form" id="auth" action="" method="POST">
                        <div class="form-group">
                            <h3 class="centrerTexte">Déjà un compte ?</h3>
                        </div>

                        <div class="form-group">
                            <p class="texteARap control-label" for="pseudo">Pseudo
                                <input id="pseudoA" name="pseudoA" type="text" maxlength="20" minlength="4"  class="texteARap form-control">
                            </p>
                        </div>

                        <div class="form-group">
                            <p class="texteARap control-label" for="mdp">Mot de passe 
                                <input id="mdpA" name="mdpA" type="password" minlength="5" class="texteARap form-control">
                            </p>
                        </div>


                        <div class="form-group">
                            <input id="connectCom" type="submit" name="connectCom" class="btn  btn-block" value="Conneion"/>
                        </div>

                        <p class="texteARap centrerTexte">Vous n'êtes pas encore inscrit ? <a href="index.php?page=inscription.php">Cliquez-ici</a></p>
                    </form>
                </div>
            </div>
        </div>

        <!--
                <div class="col-sm-4 ">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="POST" action="#" role="form" id="formInsc">
                                <div class="form-group">
                                    <h3 class="centrerTexte">Pas encore de compte ?</h3>
                                </div>
                                <div class="form-group">
                                    <p class="texteARap control-label " for="nom">Nom
                                        <input id="nom" name="nom" type="text" required="true" maxlength="30" class="texteARap form-control">
                                    </p>
                                </div>
                                <div class="form-group">
                                    <p class="texteARap control-label" for="prenom">Prénom
                                        <input id="prenom" name="prenom" type="text" required="true" maxlength="20" class="texteARap form-control">
                                    </p>
                                </div>
        
                                <div class="form-group">
                                    <p class="control-label texteARap" for="adr">Adresse
                                        <input id="adr" name="adr" type="text" maxlength="50" required="true" class="texteARap form-control">
                                    </p>
                                </div>
        
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <p class="texteARap">Numéro</p>
                                        <input id="numAdr" name="numAdr" type="number" required="true" maxlength="3" class="texteARap form-control">
                                    </div>	
                                    <div class="col-sm-6 form-group">
                                        <p class="texteARap">Code postal</p>
                                        <input type="number" id="cp" name="cp" maxlength="4" required="true" class="texteARap form-control">
                                    </div>	
                                </div>
        
                                <div class="form-group">
                                    <p class="texteARap control-label" for="tel">Téléphone
                                        <input id="tel" name="tel" type="text" maxlength="9" minlength="8" pattern="(0)[0-9]{1,2}\/[0-9]{2}\.[0-9]{2}\.[0-9]{2}" placeholder="ex : 01/23.45.78" class="texteARap form-control">
                                    </p>
                                </div>
        
                                <div class="form-group">
                                    <p class="texteARap control-label" for="pseudo">Pseudo
                                        <input id="pseudo" name="pseudo" type="text" maxlength="20" minlength="4"  class="texteARap form-control">
                                    </p>
                                </div>
        
                                <div class="form-group">
                                    <p class="texteARap control-label" for="mdp">Mot de passe 
                                        <input id="mdp" name="mdp" type="text" minlength="5" class="texteARap form-control">
                                    </p>
                                </div>
        
        
                                <div class="form-group">
                                    <button id="insc" type="submit" class="btn  btn-block">S'incrire</button>
                                </div>
                                <p class="centrerTexte form-group">En créant votre compte vous acceptez notre politique !</p>
                            </form>
                        </div>
                    </div>
                </div>-->
    </div>
</div>