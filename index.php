<!DOCTYPE html>
<?php
include('./admin/lib/php/adm_liste_include.php');
$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
ob_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Classy Lee</title>
        <link rel="stylesheet" type="text/css" href="./admin/lib/css/bootstrap-3.3.7-dist/bootstrap/css/bootstrap.css">
        <!--<link rel="stylesheet" type="text/css" href="./admin/lib/css/body.css">
        <link rel="stylesheet" type="text/css" href="./admin/lib/css/accueil.css">
        <link rel="stylesheet" type="text/css" href="./admin/lib/css/affichage.css">-->

        <link rel="stylesheet" type="text/css" href="./admin/lib/css/couleurs.css">
        <link rel="stylesheet" type="text/css" href="./admin/lib/css/balise.css">
        <link rel="stylesheet" type="text/css" href="./admin/lib/css/class.css">


        <script type="text/javascript" src="./admin/lib/js/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="./admin/lib/js/jquery-validation-1.15.0//dist/jquery.validate.min.js"></script>
        <script type="text/javascript" src="./admin/lib/css/bootstrap-3.3.7-dist/bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="./admin/lib/js/functionsJquery.js"></script>
        <script type="text/javascript" src="./admin/lib/js/messageJqueryVal.js"></script>
        <script src="admin/lib/js/functionsJqueryVal.js" type="text/javascript"></script>
        <script src="admin/lib/js/functionJqueryAjoutP.js" type="text/javascript"></script>
        <script src="admin/lib/js/functionJqueryLogin.js" type="text/javascript"></script>
        <script src="admin/lib/js/functionsJqueryAuth.js" type="text/javascript"></script>
        
    </head>
    <body>
        <header>
            <div class="container-fluid">
                <div class="row">
                    <!--<div class="header-right col-sm-4 col-md-4"></div> -->
                    <div  class="header-logo col-sm-offset-4  col-sm-4 col-xs-4 clearfix">
                        <a href="index.php?page=accueil.php" title="Classy Lee">
                            <img class="img-responsive" src="./admin/images/classylee.jpg" alt="Classy Lee">
                        </a>
                    </div>                   

                    <div class="blockGly col-sm-4 col-xs-4 ">                        
                        <div class="panier col-sm-6 ">                                     

                            <span class="inv" id="nbArt">
                                <?php
                                if (isset($_SESSION['panier']['ref'])) {
                                    if (!empty($_SESSION["panier"]["qteTotal"])) {
                                        print $_SESSION["panier"]["qteTotal"];
                                    }
                                } else {
                                    print '';
                                }
                                ?>
                            </span><br/>
                            <a class="test" href="index.php?page=panier.php"> 
                                <span class="glyphicon glyphicon-shopping-cart black"></span><br>
                                <span class="textPanier black">Votre panier</span>
                            </a>
                            <div id="resumer"></div>    
                        </div> 

                        <div class="user col-sm-6">
                            <a href="index.php?page=login.php">
                                <span class="glyphicon glyphicon-user black centre"></span><br>
                                <span class="textPanier black">
                                    <?php if (isset($_SESSION['user'])) { ?>
                                    <a class="texteARap" href="index.php?page=disconnect.php"><?php print 'Se déconnecter ' . $_SESSION['user']['pseudo']; ?></a>
                                        <?php
                                    } else {
                                        print "Connexion";
                                    }?>
                                </span>
                            </a> 
                        </div> 
                    </div>   
                </div>

                <div class="row">
                    <?php
                    if (file_exists('./lib/php/menu.php')) {
                        include ('./lib/php/menu.php');
                    } ?>
                </div>
            </div>
        </header>

        <div class="main container-fluid">
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

        <footer class="footer backgroundBlack">

            <?php
            if (file_exists('./lib/php/footer.php')) {
                include ('./lib/php/footer.php');
            }
            ?>

        </footer>
    </body>
</html>
<?php
ob_end_flush();
?>
