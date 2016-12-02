<?php

function createUser($cnx,$nom,$prenom,$adresse,$cp,$tel,$pseudo,$mdp){
    $obj = new ClientDB($cnx);
    //$donnees = $obj->
    
    
    
   /* $_SESSION["user"] = array();
    $_SESSION["user"]["nom"] = array();
    $_SESSION["user"]["prenom"] = array();
    $_SESSION["user"]["adresse"] = array();
    $_SESSION["user"]["num"] = array();
    $_SESSION["user"]["cp"] = array();
    $_SESSION["user"]["tel"] = array();
    $_SESSION["user"]["pseudo"] = array();
    $_SESSION["user"]["mdp"] = array();

    
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['num']) && isset($_POST['cp']) && isset($_POST['tel']) && isset($_POST['pseudo']) && isset($_POST['mdp'])){
        array_push($_SESSION["user"]["nom"], $_POST["nom"]);
        array_push($_SESSION["user"]["prenom"], $_POST["prenom"]);
        array_push($_SESSION["user"]["adresse"], $_POST["adresse"]);
        array_push($_SESSION["user"]["num"], $_POST["num"]);
        array_push($_SESSION["user"]["cp"], $_POST["cp"]);
        array_push($_SESSION["user"]["tel"], $_POST["tel"]);
        array_push($_SESSION["user"]["pseudo"], $_POST["pseudo"]);
        array_push($_SESSION["user"]["mdp"], $_POST["mdp"]);
    }*/
}

