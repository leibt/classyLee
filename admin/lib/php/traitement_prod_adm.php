<?php
$obj = new ProduitsDB($cnx);
if(isset($_POST['ajouter'])){
    if(isset($_POST['ajoutSt']) && ! empty($_POST['ajoutSt'])){
        $ref=$_POST['ref'];
        $taille=$_POST['taille'];
        $qte=$_POST['ajoutSt'];
        $data=$obj->ajoutQte($ref, $taille, $qte);
        print '<h4 class="gray centrerTexte">La quantité a bien été ajoutée !</h4>';//print_r($data);  
    }
}

if(isset($_POST['suppr'])){
    $ref=$_POST['ref'];
    $taille=$_POST['taille'];
    
    $data=$obj->suppArt($ref,$taille);
    print '<h4 class="gray centrerTexte">L\'article a bien été supprimer !</h4>';//print_r ($data);
}

