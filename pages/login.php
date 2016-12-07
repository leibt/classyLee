<div class="container contenu" >
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="centrerTexte gras espaceTexte">CONNECTEZ-VOUS</p>
                </div>
                <div class="panel-body">
                    <form role="form" id="auth" action="index.php?page=traitement_user.php" method="POST">
                        <fieldset>
                            <div class="row">
                                <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span> 
                                            <input class="form-control" placeholder="Votre pseudo" name="pseudo" id="pseudo" type="text" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-lock"></i>
                                            </span>
                                            <input class="form-control" placeholder="Mot de passe" name="mdp" id="mdp" type="password" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="envoieLog" class="btn btn-lg btn-primary btn-block backgroundGrey" value="Se connecter">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="panel-footer ">
                    <p class="centrerTexte"> Vous n'avez pas de compte ? <a href="index.php?page=inscription.php" > Inscrivez-vous </a></p>
                </div>
            </div>
        </div>
    </div>
</div>