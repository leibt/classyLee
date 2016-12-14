<div class="container">
    <?php
    $obj = new ProduitsDB($cnx);
    $donnees = $obj->getListeProducts();

    $verif = "";
    ?>

    <div class="table-responsive">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="texteARap">Ref</th>
                    <th class="hidden-xs hidden-sm">Image</th>
                    <th class="texteARap">Libelle</th>
                    <th class="texteARap">Taille</th>
                    <th class="hidden-xs hidden-sm">Prix</th>
                    <!--<th>Quantite</th>-->
                    <th class="texteARap">Ajout quantite</th>
                    <th class="texteARap">Action</th>
                </tr>
            </thead>


            <?php
            for ($i = 0; $i < count($donnees); $i++) {
                if ($donnees[$i]->libelle != $verif) {
                    ?>
                    <form method="POST" action="index.php?page=traitement_prod_adm.php">
                        <tbody>
                            <tr>
                                <th class="texteARap" scope="row"><?php echo $donnees[$i]->id_produit ?></th>
                                <td class="hidden-xs hidden-sm"><img class="img-responsive center-block" src="<?php echo ".".$donnees[$i]->image; ?>" width="20%" height="20%" alt="<?php echo $donnees[$i]->libelle; ?>" /></td>
                                <td class="texteARap"><?php echo $donnees[$i]->libelle ?></td>

                                <?php
                                $dataTaille = $obj->getTailles($donnees[$i]->id_produit);
                                ?>
                                <td class="texteARap">
                                    <select name="taille" id="taille">
                                        <?php for ($j = 0; $j < count($dataTaille); $j++) { ?>
                                            <option value="<?php echo $dataTaille[$j]->detail_taille; ?>"><?php echo $dataTaille[$j]->detail_taille; ?></option>
                                        <?php }
                                        ?>      
                                    </select>
                                </td>

                                <td class="hidden-xs hidden-sm"><?php echo $donnees[$i]->prix ?>€</td>
                                <!--<td>/<?php //echo $donnees[$i]->quantite  ?></td>-->
                                <td class="texteARap"><input type="number" name="ajoutSt" /></td>

                                <td class="texteARap">
                                    <input type="submit" name="ajouter" value="+"/>
                                    <input type="submit" name="suppr" value="X"/>
                                   <!-- <span class="glyphicon glyphicon-remove"></span>
                                    <span class="glyphicon glyphicon-plus"></span>-->
                                </td>

                        </tbody>
                        <input type="hidden" name="ref" value="<?php echo $donnees[$i]->id_produit; ?>"/>
                        <input type="hidden" name="libelle" value="<?php echo $donnees[$i]->libelle; ?>"/>
                    </form>
                    <?php
                    $verif = $donnees[$i]->libelle;
                }
            }
            ?>
        </table>

    </div>
</div>