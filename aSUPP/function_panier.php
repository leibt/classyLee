<?php

function creation() /* Cette fonction crée le panier */ {
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
    }
}

function verif_Q($cnx, $reference, $taille) /* Cette fonction vérifie qu'il y a assez d'articles en stock pour la quantité demandé */ {
    $obj = new ProduitsDB($cnx);
    $donnees = $obj->verifQte($reference, $taille);
    $qte = $donnees[0]->quantite;

    if ($_POST['qte'] <= $qte) {
        
        $v=$obj->updateQte($reference, $taille, $_POST['qte']);
        
        return TRUE;
    } else {
        return FALSE;
    }





    /* $bdd="";
      connect_db($bdd);

      $req2="SELECT quantite FROM produit WHERE ref=".$j;
      echo '<br/>'.$req2;
      $res2="";
      echo '<br/> j -> '.$j;


      if(envoiReq($req2,$bdd,$res2))
      {
      data($res2,$donnees);

      $ok=0;
      if($donnees[0]['quantite']<$_POST['qte'])
      {
      $ok=1;
      }

      else // Si oui elle elle décrémente de la quantité demandé
      {
      $req3="update produit
      set quantite= quantite -".$_POST['qte']."
      where ref=".$j;

      envoiDonnees($req3,$bdd);
      }
      }

      return $ok; */
}

function ajout(){ /* Cette fonction permet d'ajouter la quantité d'article désirée et à la fois décrémenter la quantite selectionné */ 
    if (isset($_POST['ref']) && isset($_POST['taille']) && isset($_POST['qte'])) {

        $idem_produit = array_keys($_SESSION['panier']['ref'],$_POST['ref']);
        $flag=FALSE;
        foreach($idem_produit as $key_produit) // tester si pour chaque référence trouvée, la taille correspondants
        {
            if ($_POST['taille'] == $_SESSION['panier']['taille'][$key_produit]){
                $_SESSION['panier']['qte'][$key_produit] += $_POST['qte'];
                //echo 'ok';
                //exit;
                $flag=TRUE;
            }
        }
        
        if($flag == FALSE){ // si la taille correspondant n'existe pas
            array_push($_SESSION["panier"]["image"], $_POST["image"]);
            array_push($_SESSION["panier"]["ref"], $_POST["ref"]);
            array_push($_SESSION["panier"]["libelle"], $_POST["libelle"]);
            array_push($_SESSION["panier"]["prix"], $_POST["prix"]);
            array_push($_SESSION["panier"]["taille"], $_POST["taille"]);
            array_push($_SESSION["panier"]["qte"], $_POST["qte"]);           
        }
        
       
/*        $posProdR = array_search($_POST['ref'], $_SESSION['panier']['ref']);

        if ($posProdR !== FALSE) {
            $_SESSION['panier']['qte'][$posProdR] += $_POST['qte'];
        } else {
            array_push($_SESSION["panier"]["image"], $_POST["image"]);
            array_push($_SESSION["panier"]["ref"], $_POST["ref"]);
            array_push($_SESSION["panier"]["libelle"], $_POST["libelle"]);
            array_push($_SESSION["panier"]["prix"], $_POST["prix"]);
            array_push($_SESSION["panier"]["taille"], $_POST["taille"]);
            array_push($_SESSION["panier"]["qte"], $_POST["qte"]);
        }
        return 'OK';
    }
    else{
        return 'PAS OK';
    }*/
    }
}

function suppression_art($ref,$taille,$cnx){
    $temp=array();
    $temp['image']=array();
    $temp['ref']=array();
    $temp['libelle']=array();
    $temp['prix']=array();
    $temp['taille']=array();
    $temp['qte']=array();
    
    for($i=0; $i < count($_SESSION['panier']['ref']) ; $i++){
        
        if($_SESSION['panier']['ref'][$i] !== $ref || $_SESSION['panier']['taille'][$i] !== $taille){
            array_push($temp['image'],$_SESSION['panier']['image'][$i]); /* array_push permet d'ajouter en fin de tableau */ 
            array_push($temp['ref'],$_SESSION['panier']['ref'][$i]);
            array_push($temp['libelle'],$_SESSION['panier']['libelle'][$i]);
            array_push($temp['prix'],$_SESSION['panier']['prix'][$i]);
            array_push($temp['taille'],$_SESSION['panier']['taille'][$i]);
            array_push($temp['qte'],$_SESSION['panier']['qte'][$i]);
        }

        else
        {
            $reference=$_SESSION['panier']['ref'][$i];
            $t=$_SESSION['panier']['taille'][$i];   
            $quantite=$_SESSION['panier']['qte'][$i];    
        }
    }
    ajout_Q($reference,$t,$quantite,$cnx);
       
    $_SESSION['panier']=$temp;
    unset($temp); //Detruit l'array temporaire 
    
}


function ajout_Q($ref,$t,$quantite,$cnx){ /* cette fonction permet de ré-ajouter la quantité de l'article supprimé du panier */
    $obj = new ProduitsDB($cnx);
    $upt=$obj->ajoutQte($ref, $t, $quantite);
    
    return $upt;  
} 

function total (){ /* Cette fonction permet de faire le calcul du total */
    $tot=0;
    if(isset($_SESSION['panier']['ref'])){ 
        for($i=0 ; $i< count($_SESSION['panier']['ref']) ; $i++){
            $tot += $_SESSION['panier']['qte'][$i] * $_SESSION['panier']['prix'][$i];
        }
    }
    return $tot;
}
