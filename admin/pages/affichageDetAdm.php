<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'ajout') {
        if (isset($_GET['ref'])) {
            $obj = new ProduitsDB($cnx);
            $donnees = $obj->getProductById($_GET['ref']);
            ?>

            <div class="container ">
                <div class="row">
                    <form method="POST" action="index.php?page=traitement_prod_adm.php"> 
                        <div class="col-sm-offset-2 col-sm-5">
                            <img class="img-responsive center-block" name="image" src="<?php echo $donnees[0]->image; ?>"  alt="<?php echo $donnees[0]->libelle; ?>" />
                        </div>

                        <div class="col-sm-5 detailProd">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 id="<?php print $donnees[0]->libelle; ?>"><?php print $donnees[0]->libelle; ?></h3>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-offset-1 col-sm-11">
                                    <?php
                                    $dataTaille = $obj->getTailles($donnees[0]->id_produit);
                                    ?>

                                    <p for="taille">taille</p>
                                        <select name="taille" id="taille">
                                            <?php for ($j = 0; $j < count($dataTaille); $j++) { ?>
                                                <option value="<?php echo $dataTaille[$j]->detail_taille; ?>"><?php echo $dataTaille[$j]->detail_taille; ?></option>
                                            <?php } ?>      
                                        </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-offset-1 col-sm-10"> 
                                    <p class="">Quantité à ajouter au stock : </p>
                                </div> 

                                <div class="col-sm-2"> 
                                    <input type="number" name="nouvStock"/>
                                </div> 

                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" name="ajouter" value="Ajouter stock"/>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="ref" value="<?php echo $donnees[0]->id_produit; ?>"/>
                        <input type="hidden" name="libelle" value="<?php echo $donnees[0]->libelle; ?>"/>
                    </form>
                </div>
            </div>

            <?php
        } else {
            print "Page introuvable";
        }
    }
}



