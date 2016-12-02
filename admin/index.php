<!DOCTYPE html>
<?php
include('./lib/php/adm_liste_include.php');
$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lilook's</title>
        <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap-3.3.7-dist/bootstrap/css/bootstrap.css">

        <link rel="stylesheet" type="text/css" href="./lib/css/couleurs.css">
        <link rel="stylesheet" type="text/css" href="./lib/css/balise.css">
        <link rel="stylesheet" type="text/css" href="./lib/css/class.css">

        
        <script type="text/javascript" src="./lib/js/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="./lib/css/bootstrap-3.3.7-dist/bootstrap/js/bootstrap.js"></script>

    </head>
    <body>
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div  class="header-logo col-sm-offset-4  col-sm-4 col-xs-4 clearfix">
                        <a href="index.php?page=accueil.php" title="Lilook's">
                            <img class="img-responsive" src="./images/logo1.jpg" alt="Lilook's">
                        </a>
                    </div>                   

                    
                        <div class="col-sm-4 ">
                            <a href="index.php?page=login.php">
                                <span class="glyphicon glyphicon-user black"></span><br>
                                
                                <span class="textPanier black">
                                    <?php 
                                    if(isset($_SESSION['admin'])){ ?>
                                        <a href="index.php?page=disconnect.php"><?php print 'Se deconnecter '.$_SESSION['admin']['pseudo'];?></a>
           <?php                    }
                                    else {
                                        print "Connexion";
                                    }
                                    ?>
                                </span>
                            </a>
                        </div> 
                     
                </div>

                <div class="row">
                    <?php
                    if (file_exists('./lib/php/menuAdmin.php')) {
                        include ('./lib/php/menuAdmin.php');
                    }
                    ?>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <?php
                        
            if (isset($_GET['page'])) {
                if (file_exists("./pages/" . $_GET['page'])) /* prend la valeur du paramètre page transmise par l'URL */ {
                    include("./pages/" . $_GET['page']);
                }
            } else {
                include("./pages/accueil.php"); /* si aucune touche est entrée la page sera celle de l'accueil */
            }

            /*
              print $_SESSION['page'];
              if (!isset($_SESSION['page'])) {
              $_SESSION['page'] = "accueil";
              }
              if (isset($_GET['page'])) {
              $_SESSION['page'] = $_GET['page'];

              }
              $path = './pages/' . $_SESSION['page'] . '.php';
              if (file_exists($path)) {
              include($path);
              } else {
              print "Page introuvable";

              }
             */
            ?> 
        </div>

        <footer class = "container-fluid backgroundBlack">

            <div class = "row">
                <?php
                if (file_exists('./lib/php/footer.php')) {
                    include ('./lib/php/footer.php');
                }
                ?>
            </div>

        </footer>
    </body>
</html>
