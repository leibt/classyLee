<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$obj = new ProduitsDB($cnx);

if (isset($_GET['sup']) && isset($_GET['taille'])) {
    // print 'OKKKK C';
    $ref = $_GET['sup'];
    $taille = $_GET['taille'];

    $qteAnc = $_SESSION["panier"]["qteTotal"];

    print '<br/> la var sess qteA : ' . $qteAnc;
    $d = $obj->suppression_art($ref, $taille);
    print '<br>la quantite a sup est : ' . $d;

    $_SESSION['panier']['qteTotal'] = $qteAnc - $d;
    print '<br> sess = ' . $_SESSION['panier']['qteTotal'];

    header("location:" . $_SERVER['HTTP_REFERER']);  /* HTTP_REFERER permet de revenir à la page précédente automatiquement */
}