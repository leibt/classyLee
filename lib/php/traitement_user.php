<?php

$obj = new ClientDB($cnx);

if (isset($_POST['insc'])) {
    //echo 'ok';
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adr']) && !empty($_POST['numAdr']) && !empty($_POST['cp']) && !empty($_POST['tel']) && !empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
        $err = array();   
        
        if (count($_POST['cp']) == 4 && count($_POST['numAdr'] < 5)) {
            
            $nom = htmlentities($_POST['nom']);
            $prenom = htmlentities($_POST['prenom']);
            $adr = htmlentities($_POST['adr']);
            $numAdr = htmlentities($_POST['numAdr']);
            $cp = htmlentities($_POST['cp']);
            $tel = htmlentities($_POST['tel']);
            $pseudo = htmlentities(strtolower($_POST['pseudo'])); // de manière à identifier plus facilement (SANS PB DE CASE)
            $mdp = htmlentities(md5($_POST['mdp']));

            $adresse = $numAdr . ',' . $adr;
            $v = $obj->verifPseudo($pseudo);

            if ($v == 0) {
                if (!isset($_SESSION['user'])) {
                    $retour = $obj->createUser($nom, $prenom, $adresse, $cp, $tel, $pseudo, $mdp);

                    if ($retour == 1) {
                        $_SESSION["user"] = array();
                        $_SESSION["user"]["pseudo"] = $pseudo;
                        $_SESSION["user"]["mdp"] = $mdp;

                        header('Location: index.php?page=panier.php');
                    }else{
                        print '<h4 class="centrerTexte rouge">Une erreur semble être survenue !</h4>';
                    }
                    
                }else{
                    print '<h4 class="centrerTexte rouge">Ce pseudo existe déjà !</h4>';
                }
            } else {
                print '<h4 class="centrerTexte rouge">Ce pseudo est déjà pris</h4>';
            }
        }else{
            print '<h4 class="centrerTexte rouge">Le code postal doit comporter 4 chiffres et le numéro d\'adresse doit comporter 4 chiffres au maximum</h4>';
        }
    }
}

if (isset($_POST['envoieLog'])) {

    if (!isset($_SESSION['user'])) {
        if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
            $pseudo = htmlentities(strtolower($_POST['pseudo'])); // de manière à identifier plus facilement (SANS PB DE CASE)
            $mdp = htmlentities(md5($_POST['mdp']));

            $verif = $obj->verifConnexion($pseudo, $mdp);
                    switch ($verif[0]) {
                case 0:
                    echo "Pseudo ou mot de passe incorrect";
                    break;
                case 1:
                    echo "Admin";
                    $_SESSION["admin"] = array();
                    $_SESSION["admin"]["pseudo"] = $pseudo;
                    $_SESSION["admin"]["mdp"] = $mdp;


                    header('Location: admin/index.php?page=accueil.php');
                    ///header('Location: http://localhost/projet/classyLee/admin/index.php?page=accueil.php');
                    break;
                case 2:
                    echo "Client";
                    $_SESSION["user"] = array();
                    $_SESSION["user"]["pseudo"] = $pseudo;
                    $_SESSION["user"]["mdp"] = $mdp;

                    header('Location: index.php?page=accueil.php');
                    break;
            }
        }
    }
}