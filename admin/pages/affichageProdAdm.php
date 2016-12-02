<div class="container-fluid aff ">

    <div class="col-xs-12 col-sm-12">

        <?php
        if (isset($_GET['act'])) {
            if ($_GET['act'] == 'ajout') {

                $obj = new ProduitsDB($cnx);
                $donnees = $obj->getListeProducts();

                $verif = "";
                ?>
                <div class="row"><?php
                    for ($i = 0; $i < count($donnees); $i++) {
                        if ($donnees[$i]->libelle != $verif) {
                            ?>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="row">  
                                    <a href="index.php?page=affichageDetAdm.php&amp;action=ajout&amp;ref=<?php print $donnees[$i]->id_produit; ?>" ><img class="img-responsive center-block" src="<?php echo $donnees[$i]->image; ?>"  alt="<?php echo $donnees[$i]->libelle; ?>" /></a> 
                                </div>  

                                <div class="row">
                                    <div class="col-sm-12 centrerTexte"><p id="<?php print $donnees[$i]->libelle; ?>"><?php print $donnees[$i]->libelle; ?></p></div>

                                </div>                            

                                <?php
                                $verif = $donnees[$i]->libelle;
                                ?>
                            </div> 
                            <?php
                        }
                    }
                    ?>
                </div>

                <?php
            }
        }



        if (isset($_GET['suppr'])) {
            
        }
        ?>
    </div>
</div>