<div class="container contenu">
    <div class="row">
        <div class="col-sm-offset-6 col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="POST" action="#" role="form" id="formInsc">
                        <div class="form-group">
                            <h3 class="centrerTexte">Créer un compte</h3>
                        </div>
                        <div class="form-group">
                            <p class="control-label " for="nom">Nom
                                <input id="nom" name="nom" type="text" required="true" maxlength="30" class="form-control">
                            </p>
                        </div>
                        <div class="form-group">
                            <p class="control-label" for="prenom">Prénom
                                <input id="prenom" name="prenom" type="text" required="true" maxlength="20" class="form-control">
                            </p>
                        </div>

                        <div class="form-group">
                            <p class="control-label" for="adr">Adresse
                                <input id="adr" name="adr" type="text" maxlength="50" required="true" class="form-control">
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <p>Numéro</p>
                                <input id="numAdr" name="numAdr" type="number" required="true" maxlength="3" class="form-control">
                            </div>	
                            <div class="col-sm-6 form-group">
                                <p>Code postal</p>
                                <input type="number" id="cp" name="cp" maxlength="4" required="true" class="form-control">
                            </div>	
                        </div>

                        <div class="form-group">
                            <p class="control-label" for="tel">Téléphone
                                <input id="tel" name="tel" type="text" maxlength="9" minlength="8" pattern="(0)[0-9]{1,2}\/[0-9]{2}\.[0-9]{2}\.[0-9]{2}" placeholder="ex : 01/23.45.78" class="form-control">
                            </p>
                        </div>
                        
                        <div class="form-group">
                            <p class="control-label" for="pseudo">Pseudo
                                <input id="pseudo" name="pseudo" type="text" maxlength="20" minlength="4"  class="form-control">
                            </p>
                        </div>
                        
                        <div class="form-group">
                            <p class="control-label" for="mdp">Mot de passe 
                                <input id="mdp" name="mdp" type="text" minlength="5" class="form-control">
                            </p>
                        </div>
                        
                        
                        <div class="form-group">
                            <button id="insc" type="submit" class="btn  btn-block">S'incrire</button>
                        </div>
                        <p class="form-group">En créeant votre compte vous acceptez notre politique !</p>
                        <hr>
                        <p></p>Vous avez déja un compte ? <a href="index.php?page=login.php">Cliquez-ici</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
