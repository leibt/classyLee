<?php

class Connexion {

    private static $_instance = NULL;

    //si le constructeur existe, il est de portée private. 

    public static function getInstance($dsn, $user, $pass) {
        //s'il n'existe pas encore d'instance de PDO
        if (!self::$_instance) {  /*les deux point signifie que c'est un element static pas besoin d'etre instancié*/
            try {
                self::$_instance = new PDO($dsn, $user, $pass);
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                print 'Erreur ' . $e->getMessage() . '<br />';
            }
        }
        // retour de la variable contenant les informations de connexion ($db dans l'index)
        return self::$_instance;
    }

}
?>

