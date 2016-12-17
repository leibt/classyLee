<div class="container">
    <?php
    require './lib/php/traitement_prod_adm.php';
    $obj = new ProduitsDB($cnx);
    $verif = "";
    if (isset($_GET['cat'])) {
        $prod = $obj->getProductsByCat($_GET['cat']);
        ?>    
        <div class="table-responsive">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="hidden-xs texteARap">Ref</th>
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
                for ($i = 0; $i < count($prod); $i++) {
                    if ($prod[$i]->libelle != $verif) {
                        ?>
                        <form id="formAdm" method="POST" action="">
                            <tbody>
                                <tr>
                                    <th class="hidden-xs texteARap" scope="row"><?php echo $prod[$i]->id_produit ?></th>
                                    <td class="hidden-xs hidden-sm"><img class="img-responsive center-block" src="<?php echo "." . $prod[$i]->image; ?>" width="20%" height="20%" alt="<?php echo $prod[$i]->libelle; ?>" /></td>
                                    <td class="texteARap"><?php echo $prod[$i]->libelle ?></td>

                                    <?php
                                    $dataTaille = $obj->getTailles($prod[$i]->id_produit);
                                    ?>
                                    <td class="texteARap">
                                        <select name="taille" id="tailleAdm">
                                            <?php for ($j = 0; $j < count($dataTaille); $j++) { ?>
                                                <option value="<?php echo $dataTaille[$j]->detail_taille; ?>"><?php echo $dataTaille[$j]->detail_taille; ?></option>
                                            <?php }
                                            ?>      
                                        </select>
                                    </td>

                                    <td class="hidden-xs hidden-sm"><?php echo $prod[$i]->prix ?>€</td>
                                    <!--<td>/<?php //echo $donnees[$i]->quantite      ?></td>-->
                                    <td class="texteARap"><input type="number" id="ajoutSt" name="ajoutSt" /></td>

                                    <td class="texteARap">
                                        <input type="submit" id="ajouter" name="ajouter" value="+" />
                                        <input type="submit" id="suppr" name="suppr" value="X"/>
                                       <!-- <span class="glyphicon glyphicon-remove"></span>
                                        <span class="glyphicon glyphicon-plus"></span>-->
                                    </td>

                            </tbody>
            <!--                            <input type="hidden" id="action" value="" />-->
                            <input type="hidden" id="id_produitAdm" name="ref" value="<?php echo $prod[$i]->id_produit; ?>" />
                            <input type="hidden" id="libelleAdm" name="libelle" value="<?php echo $prod[$i]->libelle; ?>"/>
                        </form>
                        <?php
                        $verif = $prod[$i]->libelle;
                    }
                }
                ?>
            </table>

        </div>
        <?php
    }
    ?>
</div>