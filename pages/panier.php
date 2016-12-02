<?php //include("./admin/lib/php/function_panier.php"); ?>

<div class="container">

    <?php
    if (isset($_SESSION["panier"])) {
        $result = count($_SESSION["panier"]['ref']);
        ?>
        <div id='rect'><?php for ($i = 0; $i < $result; $i++) { ?>

                <div class="row">
                    <div class="col-sm-offset-1 col-sm-8">
                        <div class="col-sm-2"><?php echo '<img class="img-responsive center-block" src="' . $_SESSION["panier"]["image"][$i] . '" />'; ?></div>
                        <div class="col-sm-10">
                            <div class="col-sm-12"><?php echo $_SESSION["panier"]["libelle"][$i]; ?> </div>
                            <div class="col-sm-12">REF : <?php echo $_SESSION["panier"]["ref"][$i]; ?> </div>
                            <div class="col-sm-12">TAILLE : <?php echo $_SESSION["panier"]["taille"][$i]; ?> </div>
                            <div class="col-sm-12">QUANTITE : <?php echo $_SESSION["panier"]["qte"][$i]; ?> </div>
                        </div>
                    </div> 
                    <div class="col-sm-3">
                        <div class="col-sm-6"><?php echo $_SESSION["panier"]["prix"][$i]; ?> €</div>
                        <div class="col-sm-6"><a href="index.php?page=traitement_panier.php&amp;sup=<?php echo $_SESSION["panier"]["ref"][$i]; ?>&amp;taille=<?php echo $_SESSION["panier"]["taille"][$i]; ?>" class="black"><span class="glyphicon glyphicon-remove black"></span></a></div>

                    </div>
                </div>
            <?php }
            ?>
        </div>
    <?php } ?>
    <div class="row">
        <form action="index.php?page=traitement_achat.php" method="POST">           
            <div class="col-sm-offset-9 col-sm-3">
                <div class="col-sm-9">TOTAL : </div>
                
                <div class="col-sm-3">
                    <?php
                        $_SESSION['tot'] = total();
                        echo '<label>' . $_SESSION['tot'] . '€</label> </p>';
                    ?> 
                </div>
                
                <div class="col-sm-12">
                    <?php if ($_SESSION['tot'] > 0) { ?>
                        <input type="submit" name="payer" value="PAYER"/>
                    <?php } ?>
                        <input type="hidden" name="total" value="<?php echo $_SESSION['tot']; ?>"/>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
function total (){ /* Cette fonction permet de faire le calcul du total */
    $tot=0;
    if(isset($_SESSION['panier']['ref'])){ 
        for($i=0 ; $i< count($_SESSION['panier']['ref']) ; $i++){
            $tot += $_SESSION['panier']['qte'][$i] * $_SESSION['panier']['prix'][$i];
        }
    }
    return $tot;
}