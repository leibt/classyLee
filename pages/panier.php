<?php require './lib/php/traitement_achat.php' ?>
<div class="container contenu">
    <div id='rect'>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="hidden-xs texteARap">Image</th>
                        <th class="texteARap">Détails</th>
                        <th class="texteARap">Prix</th>
                        <th class="texteARap">Suppression</th>
                    </tr>
                </thead>
                <?php
                if (isset($_SESSION["panier"])) {
                    $result = count($_SESSION["panier"]['ref']);
                    ?>

                    <?php for ($i = 0; $i < $result; $i++) { ?>
                        <tbody>
                            <tr>
                                <td class="hidden-xs"><?php echo '<img class="img-responsive " width="30%" src="' . $_SESSION["panier"]["image"][$i] . '" />'; ?></td>
                                <td>
                                    <div class="col-sm-12 texteARap"><?php echo $_SESSION["panier"]["libelle"][$i]; ?> </div>
                                    <div class="col-sm-12 secondGrey texteARap">REF : <?php echo $_SESSION["panier"]["ref"][$i]; ?> </div>
                                    <div class="col-sm-12 texteARap">TAILLE : <?php echo $_SESSION["panier"]["taille"][$i]; ?></div>
                                    <div class="col-sm-12 texteARap">QUANTITE : <?php echo $_SESSION["panier"]["qte"][$i]; ?></div>
                                </td>
                                <td class="texteARap"><?php echo $_SESSION["panier"]["prix"][$i]; ?> €</td>
                                <td><a href="index.php?page=suppressionArticle.php&amp;sup=<?php echo $_SESSION["panier"]["ref"][$i]; ?>&amp;taille=<?php echo $_SESSION["panier"]["taille"][$i]; ?>" class="black"><span class="glyphicon glyphicon-remove black"></span></a></td>
                            </tr>
                        </tbody>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
    <div class="row">
        <form action="" method="POST">           
            <div class="col-sm-offset-5 col-sm-7 col-md-offset-7 col-md-5">
                <div class="row">
                    <div class="col-xs-offset-3 col-xs-8 col-sm-offset-6 col-sm-6 ">
                        <h4>
                            <span class="gras">TOTAL :</span> 
                            <?php
                            $_SESSION['tot'] = total();
                            echo '&nbsp; &nbsp;' . $_SESSION['tot'] . '€';
                            ?> 
                        </h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-offset-4 col-sm-8 col-md-offset-5 col-md-6">
                        <?php if ($_SESSION['tot'] > 0) { ?>
                            <input class="btnTotal" type="submit" name="payer" id="payer" value="CONFIRMER VOTRE COMMANDE"/>
                            <?php
                        }

                        if (isset($_SESSION['user'])) {
                            $user = $_SESSION['user']['pseudo'];
                            ?>
                            <input type="hidden" id="utilisateur" value="<?php echo $_SESSION['user']['pseudo']; ?>"/>
                            <?php
                        }
                        ?>
                        <input type="hidden" name="total" value="<?php echo $_SESSION['tot']; ?>"/>              
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php

function total() { /* Cette fonction permet de faire le calcul du total */
    $tot = 0;
    if (isset($_SESSION['panier']['ref'])) {
        for ($i = 0; $i < count($_SESSION['panier']['ref']); $i++) {
            $tot += $_SESSION['panier']['qte'][$i] * $_SESSION['panier']['prix'][$i];
        }
    }
    return $tot;
}

function nbTotalArt() {
    $nb = 0;
    if (isset($_SESSION['panier']['ref'])) {
        for ($i = 0; $i < count($_SESSION['panier']['ref']); $i++) {
            $nb += $_SESSION['panier']['qte'][$i];
        }
    }
    return $nb;
}
