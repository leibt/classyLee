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
                            <input id="connectCom" type="submit" name="connectCom" class="btn  btn-block" value="Connexion"/>
                        </div>

                        <p class="texteARap centrerTexte">Vous n'êtes pas encore inscrit ? <a href="index.php?page=inscription.php">Cliquez-ici</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>