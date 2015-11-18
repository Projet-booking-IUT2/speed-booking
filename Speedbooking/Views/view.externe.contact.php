<!--
Page de contact qui permet de contacter un des bookers de l'agence via un formulaire.
--------------------------------------------------------------
Le formulaire de contact pointe vers le controler ../controler/ctrl.externe.contact.php (à modifier au besoin)
Variables envoyées par la méthode post :
$_POST['user_nom']
$_POST['user_prenom']
$_POST['user_mail']
$_POST['user_tel']
$_POST['user_objet']
$_POST['user_message']
$_POST['booker_selectionné'] ou $_GET['booker_selectionné']
  -> soit on fait pointer les liens de la liste de bookers disponibles vers ..controler/ctrl.externe.contact.php?booker_active=nom
  Et on redirige vers le formulaire
  -> soit je sais pas en fait 8D
Dans tous les cas, ce formulaire a besoin:
- variable $data['booker_active'] (initialisée par défaut avec le nom du premier booker de la liste) qui contient le nom du booker que l'user veut contacter

Le controler doit vérifier les données et les transmettre par mail au booker.

A faire :
-la vue pour les messages d'erreurs
-la vue pour le message de confirmation

Améliorations :
-Aligner les champs parce-que sinon c'est moche @_@
-Rajouter un champ pour envoyer des fichiers

-->
<?php include('../Views/view.externe.header.php'); ?>
      <section class="row">
        <div class="col-md-4">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Liste de nos bookers : </h3>
            </div>
            <div class="panel-body">
              <ul class="list-group">
                <a href="#" class="list-group-item active">
                  <span class="glyphicon glyphicon-chevron-right pull-right"></span> Booker 1</a>
                <a href="#" class="list-group-item">
                  <span class="glyphicon glyphicon-chevron-right pull-right"></span> Booker 2</a>
                <a href="#" class="list-group-item">
                  <span class="glyphicon glyphicon-chevron-right pull-right"></span> Booker 3</a>
                <a href="#" class="list-group-item">
                  <span class="glyphicon glyphicon-chevron-right pull-right"></span> Booker 4</a>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Contactez <?php echo $data['booker_active']; ?></h3>
            </div>
            <div class="panel-body">
              <form action="../controler/ctrl.externe.contact.php" method="post" class= " well form ">
                <div class="row">
                      <fieldset class="form-group">
                        <legend> Vos coordonées : </legend>
                        <label for="nom" class="control-label">Nom : </label>
                        <input type="text" id="nom" class="form-control" name="user_nom">
                        <label for="prenom" class="col-md-2 control-label">Prénom : </label>
                        <input type="text" id="prenom" class="form-control" name="user_prenom">
                        <label for="mail" class="col-md-4 control-label">Mail : </label>
                        <input type="email" id="mail" class="form-control" name="user_mail">
                        <label for="tel" class="col-md-4 control-label">Tel : </label>
                        <input type="tel" id="tel" class="form-control" placeholder="0614243464" name="user_tel">
                      </fieldset>
                </div>
                <div class="row">
                    <div class="form-group">
                      <fieldset>
                        <legend>Votre message : </legend>
                        <label for="objet" class="col-md-4 control-label">Objet : </label>
                        <input type="text" id="objet" class="form-control" name="user_objet">
                        <label for="textarea" class="col-md-4 control-label">Message :</label>
                        <textarea id="textarea" class="form-control" rows="4" name="user_message"></textarea>
                      </fieldset>
                    </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-block btn-success"><span class="glyphicon glyphicon-send"></span> Envoyez</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
<?php include('../Views/view.externe.footer.php'); ?>
