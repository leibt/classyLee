<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommandeDB
 *
 * @author Leïla
 */
class CommandeDB extends Commande {

    private $_db;
    private $_CommandeArray = array();

    //$db est un objet créé dans la page d'index
    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function createCommande($pseudo,$mdp,$date,$total) {
        try {
            $query = "SELECT ajoutCommande(:pseudo,:mdp,:date,:total)";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(":pseudo", $pseudo);
            $sql->bindValue(":mdp", $mdp);
            $sql->bindValue(":date",$date);
            $sql->bindValue(":total",$total);

            $sql->execute();

            $retour = $sql->fetch();
            
            
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
        
        $idCommande=$retour[0];
        
        return $idCommande;
    }
    
    public function ajoutDetailCommande($id_commande,$id_produit,$taille,$quantite){
        try{
            $query="SELECT ajoutDetailCom(:id_commande,:id_produit,:taille,:quantite)";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(":id_commande", $id_commande);
            $sql->bindValue(":id_produit", $id_produit);
            $sql->bindValue(":taille", $taille);
            $sql->bindValue(":quantite", $quantite);
            
            $sql->execute();
            $ret = $sql->fetch();
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
        
        return $ret[0];
        
    }
    
    

    
}
