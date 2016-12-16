<?php

//header('Content-Type: application/json');
//try {
if (!isset($_SESSION['panier'])) {
    creationPanier();
} else {
    $test = ajout();
}
/* } catch (PDOException $e) {

  } */

function creationPanier() { /* Cette fonction crée le panier */
    $_SESSION["panier"] = array();
    $_SESSION["panier"]["image"] = array();
    $_SESSION["panier"]["ref"] = array();
    $_SESSION["panier"]["libelle"] = array();
    $_SESSION["panier"]["prix"] = array();
    $_SESSION["panier"]["taille"] = array();
    $_SESSION["panier"]["qte"] = array();



    if (isset($_POST["ref"]) && isset($_POST["libelle"]) && isset($_POST["prix"]) && isset($_POST["taille"]) && isset($_POST["qte"]) && isset($_POST["image"])) {
        array_push($_SESSION["panier"]["image"], $_POST["image"]);
        array_push($_SESSION["panier"]["ref"], $_POST["ref"]);
        array_push($_SESSION["panier"]["libelle"], $_POST["libelle"]);
        array_push($_SESSION["panier"]["prix"], $_POST["prix"]);
        array_push($_SESSION["panier"]["taille"], $_POST["taille"]);
        array_push($_SESSION["panier"]["qte"], $_POST["qte"]);
        $_SESSION["panier"]["qteTotal"] = $_POST['qte'];
    }
}

function ajout() { /* Cette fonction permet d'ajouter la quantité d'article désirée et à la fois décrémenter la quantite selectionné */
    if (isset($_POST['ref']) && isset($_POST['taille']) && isset($_POST['qte'])) {

        $idem_produit = array_keys($_SESSION['panier']['ref'], $_POST['ref']);
        $flag = FALSE;
        foreach ($idem_produit as $key_produit) { // tester si pour chaque référence trouvée, la taille correspondants
            if ($_POST['taille'] == $_SESSION['panier']['taille'][$key_produit]) {
                $_SESSION['panier']['qte'][$key_produit] += $_POST['qte'];

                $flag = TRUE;
                $_SESSION["panier"]["qteTotal"] +=$_POST['qte'];
            }
        }

        if ($flag == FALSE) { // si la taille correspondant n'existe pas
            array_push($_SESSION["panier"]["image"], $_POST["image"]);
            array_push($_SESSION["panier"]["ref"], $_POST["ref"]);
            array_push($_SESSION["panier"]["libelle"], $_POST["libelle"]);
            array_push($_SESSION["panier"]["prix"], $_POST["prix"]);
            array_push($_SESSION["panier"]["taille"], $_POST["taille"]);
            array_push($_SESSION["panier"]["qte"], $_POST["qte"]);
            $_SESSION["panier"]["qteTotal"] +=$_POST['qte'];
        }
    }
}

/*if (!isset($_SESSION['panier'])) {
    $rep = 'ok';
    
    echo $rep; 
} else {
     $rep = 'pasok';
    echo $rep;
}


/*
if (!isset($_SESSION['panier'])) {
    creationPanier();
} else {
    $test = ajout();
}*/


