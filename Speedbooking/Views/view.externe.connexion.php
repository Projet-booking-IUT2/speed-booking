<?php include('../Views/view.header.php'); ?>

<!--
Page de connexion au site, destiné aux bookers et aux groupes.
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
Le formulaire de connexion pointe vers le controler ../controler/ctrl.externe.connexion.php (à modifier au besoin)
Variables envoyées par la méthode post :
$_POST['user_id'] -> Identifiant de l'utilisateur
$_POST['user_mpd'] -> Mot de passe de l'utilisateur

Le controler doit vérifier les données et rediriger soit vers le formulaire avec alertes d'erreurs (si erreur),
soit vers la "face" interne du site (si ok)

A faire :
- La vue pour le message d'erreur

Améliorations :
- Aligner les deux champs du formulaire
- Centrer le formulaire verticalement
- Utiliser des cookies pour afficher automatiquement les variables
-->

  <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
  <li class="active"><a href="../Controler/portail.ctrl.php" ><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
</ul>
</div><!--navbar collapse-->
</div><!--container nav-->
</nav><!-- nav-->
</header>
      <section class="row">
        <div class="col-md-offset-2 col-md-8 col-md-offset-2">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Connectez-vous !</h3>
            </div>
            <div class="panel-body">
             <div id="logoB" class="col-md-4"><img id="logoOver" src="../Views/logo150.png"/></div>
              <form action="../Controler/portail.ctrl.php" method="post" class= "form-horizontal col-md-11 ">
                <div class="row">
                    <div class="form-group">
                      <label for="id" class="col-md-4 control-label">Identifiant : </label>
                      <div class="col-md-8"><input type="text" id="id" class="form-control" name="user_id"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                      <label for="password" class="col-md-4 control-label">Mot de passe : </label>
                      <div class="col-md-8"><input type="password" id="password" class="form-control" name="user_mdp"></div>
                    </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-block btn-success"><span class="glyphicon glyphicon-log-in"></span> Connexion</button>
                </div>
              </form>
            </div><!--<div class="panel-body"> -->
          </div><!--<div class="panel panel-primary"> -->
        </div> <!--<div class="col-md-8">-->
      </section>
<?php include('../Views/view.footer.php'); ?>
