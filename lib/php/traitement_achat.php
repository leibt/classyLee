<?php 
$obj = new CommandeDB($cnx);
$objProd = new ProduitsDB($cnx);

if(isset($_POST['payer']) && isset($_POST['total'])){
    echo 'ok';
   if(isset($_SESSION['user'])){
             
       $result = count($_SESSION["panier"]['ref']);
       
       for ($i = 0; $i < $result; $i++) {
           $ref=$_SESSION["panier"]["ref"][$i];
           $taille=$_SESSION["panier"]["taille"][$i];
           $qte=$_SESSION["panier"]["qte"][$i];
           
           $v=$objProd->updateQte($ref, $taille, $qte);
       }
       
       $pseudo=$_SESSION['user']['pseudo'];
       $mdp=$_SESSION['user']['mdp'];
       if(!empty($pseudo) && !empty($mdp)){
           $date = date('Y-m-d');
           $id_commande = $obj->createCommande($pseudo, $mdp, $date, $_POST['total']);
           
           $_SESSION['total'] = $_POST['total'];
           
           if($id_commande > 0){
               $nbArt=  count($_SESSION["panier"]["ref"]);
               
               for($i=0; $i < $nbArt ;$i++){
                   $ref = $_SESSION["panier"]["ref"][$i];
                   $taille = $_SESSION["panier"]["taille"][$i];
                   $qte = $_SESSION["panier"]["qte"][$i];
                   
                   $_SESSION["numCom"] = $id_commande;
                   
                   $retour=$obj->ajoutDetailCommande($id_commande,$ref,$taille,$qte);
                   
                   if($retour == 1){
                       header('Location: index.php?page=recapitulatifCommande.php');
                   }
                   //print '<br>Retour insert detail commande : '.$retour;
               }
           }
           
       }
       
       //echo "le nom est : ".$pseudo." ".$mdp;
       
       
       
   } 
   else{
       header('Location: index.php?page=logCommande.php');
       
       //header('Location: index.php?page=login.php');
   }
}

