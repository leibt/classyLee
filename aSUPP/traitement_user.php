<?php

header("location:" . $_SERVER['HTTP_REFERER']);

//include("./admin/lib/php/function_user.php");

$obj = new ClientDB($cnx);

if (isset($_POST['insc'])) {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adr']) && !empty($_POST['numAdr']) && !empty($_POST['cp']) && !empty($_POST['tel']) && !empty($_POST['pseudo']) && !empty($_POST['mdp'])) {

        $nom = htmlentities($_POST['nom']);
        $prenom = htmlentities($_POST['prenom']);
        $adr = htmlentities($_POST['adr']);
        $numAdr = htmlentities($_POST['numAdr']);
        $cp = htmlentities($_POST['cp']);
        $tel = htmlentities($_POST['tel']);
        $pseudo = htmlentities(strtolower($_POST['pseudo'])); // de manière à identifier plus facilement (SANS PB DE CASE)
        $mdp = htmlentities(md5($_POST['mdp']));

        $adresse = $numAdr . ',' . $adr;
        print 'le pseudo est ' . $pseudo;
        $v = $obj->verifPseudo($pseudo);

        print ($v);

        if ($v == 0) {
            if (!isset($_SESSION['user'])) {
                $retour = $obj->createUser($nom, $prenom, $adresse, $cp, $tel, $pseudo, $mdp);
                echo 'Retour : ' . $retour;

                if ($retour == 1) {
                    $_SESSION["user"] = array();
                    $_SESSION["user"]["pseudo"] = $pseudo;
                    $_SESSION["user"]["mdp"] = $mdp;

                    /* array_push($_SESSION["user"]["pseudo"], $pseudo);
                      array_push($_SESSION["user"]["mdp"], $mdp); */
                }
            }
        } else {
            print_r('Pseudo deja pris');
        }
    }
}

if (isset($_POST['envoieLog'])) {

    if (!isset($_SESSION['user'])) {
        if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
            $pseudo = htmlentities(strtolower($_POST['pseudo'])); // de manière à identifier plus facilement (SANS PB DE CASE)
            $mdp = htmlentities(md5($_POST['mdp']));

            $verif = $obj->verifConnexion($pseudo, $mdp);
            //print_r('test verif : : '.$verif[0]);
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