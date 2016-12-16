<?php

class Vue_commandeDB {

    private $_db;

    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    
    public function getCommande($id_commande){
        try{
            $query="SELECT * FROM vue_com WHERE id_commande=:id_commande";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id_commande);
            $resultset->execute();
            $data = $resultset->fetchAll();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        return $data;
    }

    public function getDetails($id_commande){
        try{
            $query="SELECT * FROM vue_details WHERE id_commande=:id_commande";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id_commande);
            $resultset->execute();
            $data = $resultset->fetchAll();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        return $data;
    }
}
