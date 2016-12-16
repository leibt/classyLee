<?php
header('Content-Type: application/json');
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/JsonProduitDB.class.php';

$cnx = Connexion::getInstance($dsn,$user,$pass);

try{       
    $search = new JsonProduitDB($cnx);
    
    $qteDB= $search->verifQte($_GET['ref'], $_GET['taille']);
       
    if ($_GET['qte'] <= $qteDB[0]) { 
        $retour = $search->getProductById($_GET['ref']);//->verifQte($_GET['ref'], $_GET['detail_taille']); 
        echo json_encode($retour);        
        //echo json_encode($qteDB);
    }  
    /*$rep = 'ok';//$_GET['ref'];
    echo json_encode($rep); */
}
catch(PDOException $e){
    echo json_encode($e);
}


