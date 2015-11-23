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
          ['lieuTravail']
          ['dernièreMaj']
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
        <form action="../Controler/contacts.ctrl.php" method="post" class= " well form ">
<!--        <input type="text" id="nom" class="form-control" name="c_nom">-->

      <?php
      //echo value=\"$data['contact']['nom']\" ";
      if(isset ($data['contact'])) {
          //formulaire rempli
          ?>
          <div class="row">
              <!-- A afficher si à jour : -->
                <div class="alert alert-info col-md-3 pull-right">
                <strong>Contact à jour :)</strong>
                </div>
              <!-- A afficher si PAS à jour : -->
                <div class="alert alert-danger col-md-3 pull-right">
                <strong>Contact Obscolète ! </strong>
                </div>
          </div>
          <div class="row">
                <fieldset class="form-group">
                  <label for="nom" class="control-label">Nom : </label>
                  <input type="text" id="nom" class="form-control" name="c_nom" value ="<?= $data['contact']['nom'] ?>" />
                  <label for="prenom" class="col-md-2 control-label">Prénom : </label>
                  <input type="text" id="prenom" class="form-control" name="c_prenom" value ="<?= $data['contact']['prenom'] ?>" />
                  <label for="mail" class="col-md-4 control-label">Mail : </label>
                  <input type="email" id="mail" class="form-control" name="c_mail" value ="<?= $data['contact']['email'] ?>" />
                  <label for="tel" class="col-md-4 control-label">Tel : </label>
                  <input type="tel" id="tel" class="form-control" name="c_tel" value ="<?= $data['contact']['telephone'] ?>" />
                  <label for="site" class="col-md-4 control-label">Site-web : </label>
                  <input type="url" id="site" class="form-control" name="c_site" value ="<?= $data['contact']['adresse'] ?>" />
                </fieldset>
          </div>
          <div class="row">
                <fieldset>
                    <label for="select">Type : </label>
                    <select id="select" class="form-control" name="c_type">
                     <?php
                        if ($data['contact']['metier'] == "Organisateur") {
                            echo '<option selected>Organisateur</option>';
                            echo "<option>Association</option>";
                            echo "<option>Festival</option>";
                        } else if($data['contact']['metier'] == "Association"){
                            echo '<option selected>Association</option>';
                            echo "<option>Organisateur</option>";
                            echo "<option>Festival</option>";
                        } else if ($data['contact']['metier'] == "Festival"){
                            echo '<option selected>Festival</option>';
                            echo "<option>Organisateur</option>";
                            echo "<option>Association</option>";
                        }
                      ?>
                    </select>
                    <label for="orga" class="col-md-3 control-label">Lieu de travail : </label>
                    <div class="col-md-9"><input id="orga" class="form-control" name="c_lieuTravail" value ="<?= $data['contact']['lieuTravail'] ?>"></div>
                    <label for="textarea" class="col-md-4 control-label">Notes :</label>
                    <textarea id="textarea" class="form-control" rows="2" name="c_notes"><?php //echo $data['contact']['notes'];?></textarea>
                    <div class="form-group">
                        <label  class="col-md-4 control-label">Date de mise à jour minimum :</label>
                        <input type="radio" name ="c_dureeMAJ" value="1_month">1 mois
                        <input type="radio" name ="c_dureeMAJ" value="3_month" checked>3 mois
                        <input type="radio" name ="c_dureeMAJ" value="6_month">6 mois
                        <input type="radio" name ="c_dureeMAJ" value="12_month">12 mois
                    </div>
                </fieldset>
                <div lcass="row"><div class="alert alert-sucess  pull-left">
                <i>Date de dernière mise à jour : <?= $data['contact']['dernièreMaj'] ?></i>
              </div></div>
            </div>
        <?php }
        else {
          //formulaire vide
        ?>
              <div class="form-group row">
                <label for="nom" class="col-md-2 control-label">Nom : </label>
                <div class="col-md-4"><input type="text" id="nom" class="form-control" placeholder="Ex : Dupont" name="c_nom"></div>
                <label for="prenom" class="col-md-2 control-label">Prénom : </label>
                <div class="col-md-4"><input type="text" id="prenom" class="form-control" placeholder="Ex : Charles" name="c_prenom"></div>
             </div>
             <div class="form-group row">
                <label for="mail"  class="col-md-2 control-label">Mail : </label>
                <div class="col-md-10"><input type="email" id="mail" class="form-control" placeholder="exemple@exemple.com" name="c_mail"></div>
             </div>
             <div class="form-group row">
                <label for="tel" class="col-md-2 control-label">Tel : </label>
                <div class="col-md-4"><input type="tel" id="tel" class="form-control" placeholder="Ex : 0600000000" name="c_tel"></div>
                <label for="site" class="col-md-2 control-label">Site-web : </label>
                <div class="col-md-4"><input type="url" id="site" class="form-control" placeholder="exemple.fr" name="c_site"></div>
             </div>
              <div class="form-group row">
                  <label for="select" class="col-md-2 control-label">Type : </label>
                  <div class="col-md-10"><select id="select" class="form-control" name="c_type">
                      <option selected>Choisir un rôle pour ce contact</option>
                    <option>Organisateur</option>
                    <option>Association</option>
                    <option>Festival</option>
                  </select></div>
              </div>
              <div class="form-group row">
                  <label for="orga" class="col-md-3 control-label">Lieu de travail : </label>
                  <div class="col-md-9"><input id="orga" class="form-control" placeholder="Hellfest" name="c_lieuTravail"></div>
              </div>
               <div class="form-group row">
                  <label for="textarea" class="col-md-2 control-label">Notes :</label>
                  <div class="col-md-10"><textarea id="textarea" class="form-control" rows="2" name="c_notes">Détails sur ce contact</textarea></div>
                </div>
                <div class="form-group row">
                      <label  class="col-md-4 ">Date mise à jour minimum :</label>
                      <input type="radio" name ="c_dureeMAJ" value="1_month">1 mois
                      <input type="radio" name ="c_dureeMAJ" value="3_month" checked>3 mois
                      <input type="radio" name ="c_dureeMAJ" value="6_month">6 mois
                      <input type="radio" name ="c_dureeMAJ" value="12_month">12 mois
                </div>
        <?php }
        ?>

          <div class="form-group row">
          <a href="#" class="btn btn-danger pull-left"><span class="glyphicon glyphicon-trash"></span></a>
          <button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-ok"></span></button>
        </div>
      </form>
    </div>
  </div>
</div>
</section>
<?php include('../Views/view.interne.footer.php'); ?>
