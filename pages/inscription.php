<div class="container">
    
    <form action="index.php?page=traitement_user.php" method="POST">
        <div class="row">
            <div class="col-sm-12 centrerTexte">INSCRIVEZ-VOUS</div>       
        </div>

        <div class="row">
            <div class="col-sm-offset-5 col-sm-1">Nom</div>
            <div class="col-sm-6"><input type="text" name="nom" /></div>
        </div>
        
        <div class="row">
            <div class="col-sm-offset-5 col-sm-1">Prénom</div>
            <div class="col-sm-6"><input type="text" name="prenom" /></div>
        </div>
        
        <div class="row">
            <div class="col-sm-offset-5 col-sm-1">Adresse</div>
            <div class="col-sm-6"><input type="text" name="adr" /></div>
        </div>
        
        <div class="row">
            <div class="col-sm-offset-5 col-sm-1">Numéro</div>
            <div class="col-sm-6"><input type="text" name="numAdr" maxlength="4"/></div>
        </div>
        
        <div class="row">
            <div class="col-sm-offset-4 col-sm-2">Code postal</div>
            <div class="col-sm-6"><input type="text" name="cp" maxlength="4" pattern="[0-9]{4}" placeholder="6000"/></div>
        </div>
        
        <div class="row">
            <div class="col-sm-offset-5 col-sm-1">Téléphone</div>
            <div class="col-sm-6"><input type="text" name="tel" maxlength="10" pattern="[0-9]{10}" placeholder="ex : 0123456789"/></div>
        </div>
        
        <div class="row">
            <div class="col-sm-offset-5 col-sm-1">Pseudo</div>
            <div class="col-sm-6"><input type="text" name="pseudo" /></div>
        </div>

        <div class="row">
            <div class="col-sm-offset-4 col-sm-2">Mot de passe</div>
            <div class="col-sm-6"><input type="password" name="mdp" minlength="5"/></div>
        </div>

        <div class="row">
            <div class="col-sm-offset-7 col-sm-5"><input type="submit" name="insc" value="insc"/></div>
        </div>
    </form>
</div>
