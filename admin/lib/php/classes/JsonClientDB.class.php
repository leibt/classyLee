<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClientDB2
 *
 * @author Leïla
 */
class JsonClientDB {
    private $_db;
    private $_ClientArray = array();
    
    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    
    public function verifPseudo($pseudo) {
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
        return $retour[0];
    }
    
    
}
