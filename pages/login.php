<?php
?>
<div class="container">
    
    <form action="index.php?page=traitement_user.php" method="POST">
        <div class="row">
            <div class="col-sm-12 centrerTexte">CONNECTEZ-VOUS</div>       
        </div>

        <div class="row">
            <div class="col-sm-offset-5 col-sm-1">Pseudo</div>
            <div class="col-sm-6"><input type="text" name="pseudo" /></div>
        </div>

        <div class="row">
            <div class="col-sm-offset-4 col-sm-2">Mot de passe</div>
            <div class="col-sm-6"><input type="password" name="mdp" /></div>
        </div>

        <div class="row">
            <div class="col-sm-offset-4 col-sm-8"><a href="index.php?page=inscription.php">Vous n'êtes pas encore inscrit ? Inscrivez-vous !</a></div>
        </div>

        <div class="row">
            <div class="col-sm-offset-7 col-sm-5"><input type="submit" name="envoieLog" value="Connexion"/></div>
        </div>
    </form>
</div>

