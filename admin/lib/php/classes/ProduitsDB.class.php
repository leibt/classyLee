<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProduitsDB
 *
 * @author Leïla
 */
class ProduitsDB extends Produits  {

    private $_db;
    private $_ProductsArray = array();
    private $_TaillesArray = array();

    //$db est un objet créé dans la page d'index
    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function updateQte($id_prod, $taille, $qte) {
        $retour = array();
        try {
            $queryUpd = "SELECT updateQte(:id_prod,:taille,:qte)";
            $sql = $this->_db->prepare($queryUpd);
            $sql->bindValue(':id_prod', $id_prod);
            $sql->bindValue(':taille', $taille);
            $sql->bindValue(':qte', $qte);
            $sql->execute();
            $retour[] = $sql->fetch();
        } catch (Exception $ex) {
            print_r('Echec de la reqquete de mise à jour d\'un produit' . $ex);
        }
        return $retour;
    }

    public function getTailles($id_prod) {
        try {
            $queryTaille = "SELECT distinct detail_taille FROM vue_prod WHERE id_produit = :id_prod AND quantite > 0";
            $sql = $this->_db->prepare($queryTaille);
            $sql->bindValue(":id_prod", $id_prod);
            $sql->execute();
        } catch (Exception $ex) {
            print $ex->getMessage();
        }

        while ($data = $sql->fetch()) {

            $_TaillesArray[] = new Produits($data);
        }

        // var_dump($_TaillesArray);

        return $_TaillesArray;
    }
    

    public function getProductById($ref) {
        try {
            $query = "SELECT * FROM produit WHERE id_produit = :ref ";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(":ref", $ref);
            $sql->execute();



            while ($data = $sql->fetch()) {
                $_ProductsArray[] = new Produits($data);
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        return $_ProductsArray;
    }

    public function verifQte($id_prod, $taille) {
        $qte = Array();

        try {
            $queryTaille = "SELECT quantite FROM vue_prod WHERE id_produit = :id_prod AND detail_taille = :taille";
            $sql = $this->_db->prepare($queryTaille);
            $sql->bindValue(":id_prod", $id_prod);
            $sql->bindValue(":taille", $taille);
            $sql->execute();
        } catch (Exception $ex) {
            print $ex->getMessage();
        }


        //$qte = $sql->fetch();
        while ($data = $sql->fetch()) {
            $qte[] = new Produits($data);
        }


        return $qte;
    }

    public function getProductsByCat($cat) {
        try {
            $query = "SELECT * FROM vue_prod WHERE categorie = :cat order by libelle";

            //$query = "SELECT id_produit,libelle,prix,image,categorie FROM produit WHERE categorie = :cat order by libelle ";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(":cat", $cat);
            $sql->execute();

            //$_ProductsArray = $sql->fetchAll();

            /* for($i=0;$i<count($_ProductsArray);$i++){
              //print "<br/>";
              $queryB="SELECT taille.detail_taille,existe.quantite FROM taille,existe WHERE taille.id_taille = existe.id_taille AND existe.id_produit =".$_ProductsArray[$i]['id_produit'];

              $qB = $this->_db->prepare($queryB);

              $qB->execute(); */

            while ($data = $sql->fetch()) {
                $_ProductsArray[] = new Produits($data);
                //print "<br/>".$enreg['detail_taille']." &nbsp; ".$enreg['quantite'];
            }
            //  }*/
        } catch (PDOException $e) {
            print $e->getMessage();
        }



        return $_ProductsArray;

        /* while($data=$sql->fetch()){
          $_ProductsArray[]=new Produits($data);
          print"<br>".$data['id_produit'];
          } */

        //return $_ProductsArray;
    }

    public function getListeProducts() {
        try {
            $query = "SELECT * FROM vue_prod order by libelle";
            $sql = $this->_db->prepare($query);

            $sql->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $sql->fetch()) {
            $_uneClasseArray[] = new Produits($data);
        }

        return $_uneClasseArray;
    }

    function suppression_art($ref, $taille) { //suppression article du panier
        $temp = array();
        $temp['image'] = array();
        $temp['ref'] = array();
        $temp['libelle'] = array();
        $temp['prix'] = array();
        $temp['taille'] = array();
        $temp['qte'] = array();
        
        $qte=0;

        for ($i = 0; $i < count($_SESSION['panier']['ref']); $i++) {

            if ($_SESSION['panier']['ref'][$i] !== $ref || $_SESSION['panier']['taille'][$i] !== $taille) {
                array_push($temp['image'], $_SESSION['panier']['image'][$i]); /* array_push permet d'ajouter en fin de tableau */
                array_push($temp['ref'], $_SESSION['panier']['ref'][$i]);
                array_push($temp['libelle'], $_SESSION['panier']['libelle'][$i]);
                array_push($temp['prix'], $_SESSION['panier']['prix'][$i]);
                array_push($temp['taille'], $_SESSION['panier']['taille'][$i]);
                array_push($temp['qte'], $_SESSION['panier']['qte'][$i]);
            } else {
                $id_prod = $_SESSION['panier']['ref'][$i];
                $taille = $_SESSION['panier']['taille'][$i];
                $qte = $_SESSION['panier']['qte'][$i];
                
            }
        }
        
        //ajoutQte($reference,$t,$quantite);

        $retour = array();
        try {
            $queryUpd = "SELECT ajoutQte(:id_prod,:taille,:qte)";
            $sql = $this->_db->prepare($queryUpd);
            $sql->bindValue(':id_prod', $id_prod);
            $sql->bindValue(':taille', $taille);
            $sql->bindValue(':qte', $qte);
            $sql->execute();
            $retour[] = $sql->fetch();
        } catch (Exception $ex) {
            print_r('Echec de la requete de mise à jour d\'un produit ' . $ex);
        }
        //print 'la quantite a sup est : '.$qte;
        $_SESSION['panier'] = $temp;
        
        unset($temp); //Detruit l'array temporaire 
        return $qte;
    }

    function ajoutQte($id_prod, $taille, $qte) {
        $retour = array();
        try {
            $queryUpd = "SELECT ajoutQte(:id_prod,:taille,:qte)";
            $sql = $this->_db->prepare($queryUpd);
            $sql->bindValue(':id_prod', $id_prod);
            $sql->bindValue(':taille', $taille);
            $sql->bindValue(':qte', $qte);
            $sql->execute();
            $retour[] = $sql->fetch();
        } catch (Exception $ex) {
            print_r('Echec de la requete de mise à jour d\'un produit ' . $ex);
        }
        return $retour;
    }

    function suppArt($id_prod, $taille) {
        $retour = array();
        try {
            $query = "SELECT deleteArt(:id_prod,:taille)";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(':id_prod', $id_prod);
            $sql->bindValue(':taille', $taille);
            $sql->execute();
            $retour[] = $sql->fetch();
        } catch (Exception $ex) {
            print_r('Echec de la requete de suppression d\'un produit : ' . $ex);
        }
        return $retour;
    }


}
