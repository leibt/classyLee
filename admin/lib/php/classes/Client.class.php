<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Client
 *
 * @author Leïla
 */
class Client {
    
    private $_attributs = array();

    public function __construct(array $data) {
        $this->hydrate($data);
    }

//hydrater = affecter des valeurs aux attributs de la classe
    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
            //on affecte à la clé sa valeur; le tableau $data est le resultset (tableau associatif)
        }
    }

//tous les getters des champs de la BD en une seule méthode
    public function __get($nom) {
        if (isset($this->_attributs[$nom])) {
// visualiser l'attribut traité
// print_r($this->_attributs);
            return $this->_attributs[$nom];
        }
    }

//tous les setters des champs de la BD en une seule méthode
    public function __set($nom, $valeur) {
        $this->_attributs[$nom] = $valeur;
    }

//autres méthodes de la classe
    public function faireQqch() {
        print "<br />Méthode faireQqch";
    }
}
