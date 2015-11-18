<!--
Page d'affichage des contacts.
-header
-fiche contacts (formulaire)
-Liste des contacts existantes (aside)
-footer
--------------------------------------------------------------
Par défaut, la page affiche la fiche du premier contact. Mais l'user peut selectionner un autre contact via le aside
La fiche a donc besoin des variables suivantes :
$data['contact']
          ['nom']
          ['prenom']
          ['mail']
          ['tel']
          ['site']
          ['type']
          ['notes']
          ['maj']
S'il n'y existe aucun contact, le controler ne doit pas créer de variable.

A faire :
- les fonctions ajouter/supprimer/modifier
- différentes alertes selon si le contact est à jour ou non.

Améliorations :


-->
<?php include('../Views/view.interne.header.php'); ?>

        <li><a href="#"><span class="glyphicon glyphicon-calendar"></span> Mes dates</a></li>
        <li class="active"><a href="#"><span class="glyphicon glyphicon-phone-alt"></span> Mes contacts</a></li>
        <li><a href="#" ><span class="glyphicon glyphicon-file"></span> Mes fichiers</a></li>
        <li><a href="#" ><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
        <li><a href="#" ><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
      </ul>
    </div>
  </div>
</header>
<?php include('../Views/view.interne.contacts.aside.php'); ?>
<div class="col-md-8">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">
        <?php
          if(isset ($data['contact'])) {
            echo $data['contact']['nom']; echo $data['contact']['prenom'];
          }
          else {
            echo "Nouveau contact :";
          }

        ?></h3>
    </div>
    <div class="panel-body">
      <form action="../controler/ctrl.interne.contact.php" method="post" class= " well form ">
      <?php
      //echo value=\"$data['contact']['nom']\" ";
      if(isset ($data['contact'])) {
          //formulaire rempli
          ?>
          <div class="row">
                <div class="alert alert-info">
                <strong>Infos sur la mise à jour</strong>
                </div>
          </div>
          <div class="row">
                <fieldset class="form-group">
                  <label for="nom" class="control-label">Nom : </label>
                  <input type="text" id="nom" class="form-control" name="c_nom" >
                  <label for="prenom" class="col-md-2 control-label">Prénom : </label>
                  <input type="text" id="prenom" class="form-control" name="c_prenom">
                  <label for="mail" class="col-md-4 control-label">Mail : </label>
                  <input type="email" id="mail" class="form-control" name="c_mail">
                  <label for="tel" class="col-md-4 control-label">Tel : </label>
                  <input type="tel" id="tel" class="form-control" placeholder="0614243464" name="c_tel">
                  <label for="site" class="col-md-4 control-label">Site-web : </label>
                  <input type="url" id="site" class="form-control" name="c_site">
                </fieldset>
          </div>
          <div class="row">
                <fieldset>
                    <label for="select">Type : </label>
                    <select id="select" class="form-control" name="c_type">
                      <option>Organisateur</option>
                      <option>Association</option>
                      <option>Festival</option>
                    </select>
                    <label for="textarea" class="col-md-4 control-label">Notes :</label>
                    <textarea id="textarea" class="form-control" rows="2" name="c_notes"></textarea>
                    <div class="form-group">
                        <label  class="col-md-4 control-label">Date de mise à jour minimum :</label>
                        <input type="radio" name ="c_dureeMAJ" value="1_month">1 mois
                        <input type="radio" name ="c_dureeMAJ" value="3_month" checked>3 mois
                        <input type="radio" name ="c_dureeMAJ" value="6_month">6 mois
                        <input type="radio" name ="c_dureeMAJ" value="12_month">12 mois
                    </div>
                </fieldset>
            </div>
        <?php }
        else {
          //formulaire vide
        ?>
        <div class="row">
              <fieldset class="form-group">
                <label for="nom" class="control-label">Nom : </label>
                <input type="text" id="nom" class="form-control" name="c_nom">
                <label for="prenom" class="col-md-2 control-label">Prénom : </label>
                <input type="text" id="prenom" class="form-control" name="c_prenom">
                <label for="mail" class="col-md-4 control-label">Mail : </label>
                <input type="email" id="mail" class="form-control" name="c_mail">
                <label for="tel" class="col-md-4 control-label">Tel : </label>
                <input type="tel" id="tel" class="form-control" placeholder="0614243464" name="c_tel">
                <label for="site" class="col-md-4 control-label">Site-web : </label>
                <input type="url" id="site" class="form-control" name="c_site">
              </fieldset>
        </div>
        <div class="row">
              <fieldset>
                  <label for="select">Type : </label>
                  <select id="select" class="form-control" name="c_type">
                    <option>Organisateur</option>
                    <option>Association</option>
                    <option>Festival</option>
                  </select>
                  <label for="textarea" class="col-md-4 control-label">Notes :</label>
                  <textarea id="textarea" class="form-control" rows="2" name="c_notes"></textarea>
                  <div class="form-group">
                      <label  class="col-md-4 control-label">Date de mise à jour minimum :</label>
                      <input type="radio" name ="c_dureeMAJ" value="1_month">1 mois
                      <input type="radio" name ="c_dureeMAJ" value="3_month" checked>3 mois
                      <input type="radio" name ="c_dureeMAJ" value="6_month">6 mois
                      <input type="radio" name ="c_dureeMAJ" value="12_month">12 mois
                  </div>
              </fieldset>
          </div>
        <?php }
        ?>

        <div class="form-group">
          <button type="submit" class="btn btn-block btn-success"><span class="glyphicon glyphicon-send"></span> Envoyez</button>
        </div>
      </form>
    </div>
  </div>
</div>
</section>
<?php include('../Views/view.interne.footer.php'); ?>
