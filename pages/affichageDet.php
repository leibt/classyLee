<?php
if (isset($_GET['ref'])) {
    $obj = new ProduitsDB($cnx);
    $donnees = $obj->getProductById($_GET['ref']);
    ?>

    <div class="container ">
        <div class="row">
            <form method="POST" action="index.php?page=traitement_panier.php"> 
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
                            <p name="<?php print $donnees[0]->prix; ?>">Prix : <?php print $donnees[0]->prix; ?> € </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-offset-1 col-sm-11">
                            <?php
                            $dataTaille = $obj->getTailles($donnees[0]->id_produit);
                            //print $data[0]->libelle;
                            ?>

                            <p for="taille">taille</label>
                            <select name="taille" id="taille">
                                <?php for ($j = 0; $j < count($dataTaille); $j++) { ?>
                                        <option value="<?php echo $dataTaille[$j]->detail_taille; ?>"><?php echo $dataTaille[$j]->detail_taille; ?></option>
                                <?php } ?>      
                            </select>
                                
                                <select name="qte" class="qte">
					<option value=1>1</option>
					<option value=2>2</option>
					<option value=3>3</option>
					<option value=4>4</option>
					<option value=5>5</option>
				</select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <input type="submit" name="achete" value="Ajouter au panier"/>
                        </div>
                    </div>
                </div>
                
                <input type="hidden" name="ref" value="<?php echo $donnees[0]->id_produit; ?>"/>
		<input type="hidden" name="libelle" value="<?php echo $donnees[0]->libelle; ?>"/>
                <input type="hidden" name="image" value="<?php echo $donnees[0]->image; ?>"/>
                <input type="hidden" name="prix" value="<?php echo $donnees[0]->prix; ?>"/>
            </form>
        </div>
    </div>

    <?php
} else {
    print "Page introuvable";
}

