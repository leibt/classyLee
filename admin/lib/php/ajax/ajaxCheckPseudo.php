<?php
header('Content-Type: application/json');
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/JsonClientDB.class.php';

$cnx = Connexion::getInstance($dsn,$user,$pass);

try{       
    $search = new JsonClientDB($cnx);
    
    $existDB= $search->verifPseudo($_GET['pseudo']);//verifQte($_GET['ref'], $_GET['taille']);
       
    echo json_encode($existDB);
}
catch(PDOException $e){
    echo json_encode($e);
}


