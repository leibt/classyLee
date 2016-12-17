<?php 

$obj = new ProduitsDB($cnx);

/*if (isset($_GET['sup']) && isset($_GET['taille'])) {
    print 'TEST ';
    /*$ref = $_GET['sup'];
    $taille = $_GET['taille'];

    $qteAnc = $_SESSION["panier"]["qteTotal"];

    print '<br/> la var sess qteA : ' . $qteAnc;
    $d = $obj->suppression_art($ref, $taille);
    print '<br>la quantite a sup est : ' . $d;

    $_SESSION['panier']['qteTotal'] = $qteAnc - $d;
    print '<br> sess = ' . $_SESSION['panier']['qteTotal'];*/
    
    //header("location:".$_SERVER['HTTP_REFERER']);  /* HTTP_REFERER permet de revenir à la page précédente automatiquement */
//}

if (isset($_POST['achete']) && !isset($_GET['sup']) && !isset($_GET['taille'])) {   
    $ref = $_POST['ref'];
    $taille = $_POST['taille'];

    $qteProdBD=$obj->verifQte($ref,$taille);//($_POST['ref'],$_POST['taille']);
    //echo $qteProdBD[0]->quantite;
    if ($_POST['qte'] <= $qteProdBD[0]->quantite) {       
        if(!isset($_SESSION['panier'])){
            creationPanier();
            print '<h3 class="gray espaceTexte centrerTexte">Article bien ajouté !</h3>';
            
        }
        else{
            $test=ajout();
            print '<h3 class="gray espaceTexte centrerTexte">Article bien ajouté !</h3>';
        }
        
        $verif= TRUE;
    } else {
        print '<h3 class="gray espaceTexte centrerTexte">Stock insufisant !</h3>';
        $verif= FALSE;
    }   
}

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
