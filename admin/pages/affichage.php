<div class="container-fluid aff ">

    <div class="hidden-xs hidden-sm hidden-md col-md-2 center-block">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">         
                <li class="espaceTexte ">FEMMES
                    <ul class="noList">
                        <li><a href="index.php?page=affichage.php&amp;cat=wh">Hauts</a></li>
                        <li><a href="index.php?page=affichage.php&amp;cat=wr">Robes</a></li>
                        <li><a href="index.php?page=affichage.php&amp;cat=wb">Jeans</a></li>
                    </ul>
                </li>

                <li class="espaceTexte">HOMMES
                    <ul class="noList">
                        <li><a href="index.php?page=affichage.php&amp;cat=hh">Hauts</a></li>
                        <li><a href="index.php?page=affichage.php&amp;cat=hv">Manteaux</a></li>
                        <li><a href="index.php?page=affichage.php&amp;cat=hb">Jeans</a></li>
                    </ul>
                </li>

                <li class="espaceTexte">ACCESSOIRES
                    <ul class="noList">
                        <li><a href="index.php?page=affichage.php&amp;cat=ab">Bijoux</a></li>
                        <li><a href="index.php?page=affichage.php&amp;cat=aa">Autres</a></li>
                        <li><a href="index.php?page=affichage.php&amp;cat=as">Sacs</a></li>
                    </ul>
                </li>

                <li class="espaceTexte">CHAUSSURES
                    <ul class="noList">
                        <li><a href="index.php?page=affichage.php&amp;cat=ch">Hommes</a></li>
                        <li><a href="index.php?page=affichage.php&amp;cat=cf">Femmes</a></li>
                    </ul>
                </li>


            </ul>
        </div>
    </div>

    <div class="col-xs-12 col-lg-10">

        <?php
        if (isset($_GET['cat'])) {
            $obj = new ProduitsDB($cnx);
            $donnees = $obj->getProductsByCat($_GET['cat']);

            $verif = "";
            ?>
            <div class="row">
                <?php for ($i = 0; $i < count($donnees); $i++) { ?>
                    <?php if ($donnees[$i]->libelle != $verif) { ?>
                        <div class="col-xs-12 col-sm-6 col-md-4  padding2">
                            <div class="row " id="hm-zoom">  
                                <img class="img-responsive center-block" src="<?php echo ".".$donnees[$i]->image; ?>"  alt="<?php echo $donnees[$i]->libelle; ?>" />
                            </div>  

                            <div class="row">
                                <div class="col-sm-12 centrerTexte" ><?php print $donnees[$i]->libelle; ?></div>
                                <div class="col-sm-12 centrerTexte"><p class="gras"><?php print $donnees[$i]->prix; ?> €</p></div>
                            </div>                            

                            <?php
                            $verif = $donnees[$i]->libelle;
                            ?>
                        </div> 
                        <?php
                    }
                    // print $donnees[$i]->detail_taille;
                }
                ?>
            </div>

            <?php
            // var_dump($donnees);
        } else {
            print_r("Page introuvable");
        }
        ?>
    </div>
</div>