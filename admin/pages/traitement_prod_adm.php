<?php

$obj = new ProduitsDB($cnx);
if(isset($_POST['ajouter'])){
    if(isset($_POST['ajoutSt']) && ! empty($_POST['ajoutSt'])){
        $ref=$_POST['ref'];
        $taille=$_POST['taille'];
        $qte=$_POST['ajoutSt'];
        $data=$obj->ajoutQte($ref, $taille, $qte);
        print_r($data);  
    }
}

if(isset($_POST['suppr'])){
    //Mettre une confirmation
    $ref=$_POST['ref'];
    $taille=$_POST['taille'];
    
    $data=$obj->suppArt($ref,$taille);
    print_r ($data);
}

