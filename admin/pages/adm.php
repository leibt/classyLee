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
                    <th>Ref</th>
                    <th>Image</th>
                    <th>Libelle</th>
                    <th>Taille</th>
                    <th>Prix</th>
                    <!--<th>Quantite</th>-->
                    <th>Ajout quantite</th>
                    <th>Action</th>
                </tr>
            </thead>


            <?php
            for ($i = 0; $i < count($donnees); $i++) {
                if ($donnees[$i]->libelle != $verif) {
                    ?>
                    <form method="POST" action="index.php?page=traitement_prod_adm.php">
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $donnees[$i]->id_produit ?></th>
                                <td class="backgroundRed"><img class="img-responsive center-block" src="<?php echo ".".$donnees[$i]->image; ?>" width="20%" height="20%" alt="<?php echo $donnees[$i]->libelle; ?>" /></td>
                                <td><?php echo $donnees[$i]->libelle ?></td>

                                <?php
                                $dataTaille = $obj->getTailles($donnees[$i]->id_produit);
                                ?>
                                <td>
                                    <select name="taille" id="taille">
                                        <?php for ($j = 0; $j < count($dataTaille); $j++) { ?>
                                            <option value="<?php echo $dataTaille[$j]->detail_taille; ?>"><?php echo $dataTaille[$j]->detail_taille; ?></option>
                                        <?php }
                                        ?>      
                                    </select>
                                </td>

                                <td><?php echo $donnees[$i]->prix ?></td>
                                <!--<td>/<?php //echo $donnees[$i]->quantite  ?></td>-->
                                <td><input type="number" name="ajoutSt" /></td>

                                <td>
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