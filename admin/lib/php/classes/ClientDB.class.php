<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClientDB
 *
 * @author Leïla
 */
class ClientDB extends Client {

    private $_db;
    private $_ClientsArray = array();

    //$db est un objet créé dans la page d'index
    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    
    public function infoClient($pseudo, $mdp) {
        $retour = 0;
        try {
            $query = "SELECT * FROM client WHERE pseudo = :pseudo AND mdp = :mdp";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(":pseudo", $pseudo);
            $sql->bindValue(":mdp", $mdp);
            $sql->execute();
            
            
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
        
        while($data=$sql->fetch()){
            $_ClientsArray[]= new Client($data);            
        } 
        
        return $_ClientsArray;
    }

    public function verifPseudo($pseudo) {
        //$pseudoTab = Array();
        $retour=0;
        try {
            $query = "SELECT verifPseudo(:pseudo)";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(":pseudo", $pseudo);
            $sql->execute();
            $retour=$sql->fetch();
        } catch (Exception $ex) {
            print $ex->getMessage();
        }

        //$pseudo = $sql->fetch();
       /* while ($data = $sql->fetch()) {
            $pseudoTab[] = new Client($data);
        }*/
        
        //print '<br>le retour : '.$retour[0];
        
        return $retour[0];
    }

    public function verifConnexion($pseudo, $mdp) {
        $retour = 0;
        try {
            $query = "SELECT verif_connexion(:pseudo,:mdp)";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(":pseudo", $pseudo);
            $sql->bindValue(":mdp", $mdp);
            $sql->execute();
            $retour = $sql->fetch();
            
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
        return $retour;
    }

    public function createUser($nom, $prenom, $adresse, $cp, $tel, $pseudo, $mdp) {
        try {
            $query = "SELECT createclient(:nom,:prenom,:adresse,:cp,:tel,:pseudo,:mdp,:statut)";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(":nom", $nom);
            $sql->bindValue(":prenom", $prenom);
            $sql->bindValue(":adresse", $adresse);
            $sql->bindValue(":cp", $cp);
            $sql->bindValue(":tel", $tel);
            $sql->bindValue(":pseudo", $pseudo);
            $sql->bindValue(":mdp", $mdp);
            $sql->bindValue(":statut", 'C');

            $sql->execute();

            $retour = $sql->fetch();
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
        return $retour[0];
    }
    
    

}
