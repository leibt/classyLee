<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProduitsDB2
 *
 * @author Leïla
 */
class ProduitDB2 {

    private $_db;
    private $_ProductsArray = array();
    
    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function getProductById($id_produit) {
        try {
            $query = "SELECT * FROM produit WHERE id_produit = :id_produit ";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(":id_produit", $id_produit);
            $sql->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $sql->fetch()) {
            try {
                $_ProductsArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }

        return $_ProductsArray;
    }
    
    public function verifQte($id_produit, $detail_taille) {
       // $qte = Array();

        try {
            $queryTaille = "SELECT quantite FROM vue_prod WHERE id_produit = :id_produit AND detail_taille = :detail_taille";
            $sql = $this->_db->prepare($queryTaille);
            $sql->bindValue(":id_produit", $id_produit);
            $sql->bindValue(":detail_taille", $detail_taille);
            $sql->execute();
        } catch (Exception $ex) {
            print $ex->getMessage();
        }


        $data = $sql->fetch();
        
        return $data;
        /*while ($data = $sql->fetch()) {
            try {
                $_ProductsArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }


        return $_ProductsArray;*/
    }

}
