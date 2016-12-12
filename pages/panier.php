<div class="container contenu">
    <div id='rect'>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Détails</th>
                            <th>Prix</th>
                            <th>Suppression</th>
                        </tr>
                    </thead>
    <?php
    if (isset($_SESSION["panier"])) {
        $result = count($_SESSION["panier"]['ref']);
        ?>
        
                    <?php for ($i = 0; $i < $result; $i++) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo '<img class="img-responsive " width="30%" src="' . $_SESSION["panier"]["image"][$i] . '" />'; ?></td>
                                <td>
                                    <div class="col-sm-12 texteARap"><?php echo $_SESSION["panier"]["libelle"][$i]; ?> </div>
                                    <div class="col-sm-12 secondGrey texteARap">REF : <?php echo $_SESSION["panier"]["ref"][$i]; ?> </div>
                                    <div class="col-sm-12 texteARap">TAILLE : <?php echo $_SESSION["panier"]["taille"][$i]; ?></div>
                                    <div class="col-sm-12 texteARap">QUANTITE : <?php echo $_SESSION["panier"]["qte"][$i]; ?></div>
                                </td>
                                <td class="texteARap"><?php echo $_SESSION["panier"]["prix"][$i]; ?> €</td>
                                <td><a href="index.php?page=traitement_panier.php&amp;sup=<?php echo $_SESSION["panier"]["ref"][$i]; ?>&amp;taille=<?php echo $_SESSION["panier"]["taille"][$i]; ?>" class="black"><span class="glyphicon glyphicon-remove black"></span></a></td>
                            </tr>
                        </tbody>




                    <?php }
                    ?>

                
    <?php } ?>
                        </table>
            </div>
        </div>
    <div class="row">
        <form action="index.php?page=traitement_achat.php" method="POST">           
            <div class="col-sm-offset-9 col-sm-2 ">
                <div class="col-sm-9 gras ">TOTAL : </div>

                <div class="col-sm-3">
                    <?php
                    $_SESSION['tot'] = total();
                    echo '<label>' . $_SESSION['tot'] . '€</label> </p>';
                    
                    ?> 
                </div>

                <div class="col-sm-offset-8 col-sm-4">
                    <?php if ($_SESSION['tot'] > 0) { ?>
                        <input class="btnTotal" type="submit" name="payer" value="PAYER"/>
                    <?php }                     
                    ?>
                    <input type="hidden" name="total" value="<?php echo $_SESSION['tot']; ?>"/>
                    <span><?php 
                    
                    if(isset($_SESSION["panier"]['ref'])){ 
                        //$_SESSION["nbArtTot"] = nbTotalArt();
                        echo $_SESSION["panier"]["qteTotal"];// $_SESSION["nbArtTot"];
                        ?>
                        <!--<input type="hidden" name="nbArticle" value="<?php //echo $_SESSION["nbArtTot"]; ?>" id="nbArticle"/>-->
                        <?php
                    }
                    ?>
                    </span>
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
    $nb=0;
    if (isset($_SESSION['panier']['ref'])) {
        for ($i = 0; $i < count($_SESSION['panier']['ref']); $i++) {
            $nb += $_SESSION['panier']['qte'][$i];
        }
    }
    return $nb;
}
